/* Copyright 2013 Mozilla Foundation
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/** @typedef {import("./interfaces").IDownloadManager} IDownloadManager */

import { createValidAbsoluteUrl, isPdfFile } from "pdfjs-lib";

if (typeof PDFJSDev !== "undefined" && !PDFJSDev.test("CHROME || GENERIC")) {
    throw new Error(
        'Module "pdfjs-web/download_manager" shall not be used ' +
            "outside CHROME and GENERIC builds."
    );
}

function download(blobUrl, filename) {
    const a = document.createElement("a");
    if (!a.click) {
        throw new Error('DownloadManager: "a.click()" is not supported.');
    }
    a.href = blobUrl;
    a.target = "_parent";
    // Use a.download if available. This increases the likelihood that
    // the file is downloaded instead of opened by another PDF plugin.
    if ("download" in a) {
        a.download = filename;
    }
    // <a> must be in the document for recent Firefox versions,
    // otherwise .click() is ignored.
    (document.body || document.documentElement).append(a);
    $("#exampleModal").modal("hide");
    console.log("download file ends here");
    // Wait for the download to finish before making the AJAX request
    a.addEventListener("click", function() {
        savePdfToDatabase(blobUrl, filename);
    });
    a.click();
    a.remove();
}

function savePdfToDatabase(blobUrl, filename) {

    console.log("baseurl",baseUrl)

    // Convert the Blob URL to a Blob object
    fetch(blobUrl)
        .then(response => response.blob())
        .then(blob => {
            const formData = new FormData();
            formData.append("pdfFile", blob, filename);
            
            const xhr = new XMLHttpRequest();
            xhr.open("POST", baseUrl + "save-updated-pdf", true);
            xhr.setRequestHeader('X-CSRF-TOKEN', CSRF_TOKEN);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log("PDF saved in database successfully.");
                        const responseJSON = JSON.parse(xhr.responseText);
                        const cleanedFileName = responseJSON.file_name.trim(); // Clean up file name

                        // Create a new hidden input element
                        const newHiddenInput = document.createElement("input");
                        newHiddenInput.type = "hidden";
                        newHiddenInput.name = "design_upload[]";
                        newHiddenInput.value = cleanedFileName;
                        newHiddenInput.className = cleanedFileName;

                        // Get a reference to the div where you want to append the new input
                        const containerDiv = document.getElementById("files_div");

                        // Append the new hidden input to the container div
                        containerDiv.appendChild(newHiddenInput);

                        const newContainerDiv = document.getElementById("new_div");
                        console.log("filename", cleanedFileName)
                        // const divString = '<div>' + baseUrl + cleanedFileName + '</div>';
                        const divString ='<span id="'+cleanedFileName+'" ><a target="_blank" href="' + baseUrl + cleanedFileName + '">'
                        +'<span class="badge badge-success badge-sm">File Uploaded</span>'
                        +'</a>'
                        +'<button type="button" onclick="deleteFile(\'' + cleanedFileName + '\')" class="remove-file badge badge-danger badge-sm" data-filename="' + cleanedFileName + '">&times;</button>'
                        +'</span>';
                        // Use insertAdjacentHTML to add the divString as HTML content inside the newContainerDiv
                        newContainerDiv.insertAdjacentHTML("beforeend", divString);


                    } else {
                        console.error("Error saving PDF in database:", xhr.statusText);
                    }
                }
            };
            xhr.send(formData);
        })
        .catch(error => {
            console.error("Error fetching Blob:", error);
        });
}

/**
 * @implements {IDownloadManager}
 */
class DownloadManager {
    #openBlobUrls = new WeakMap();

    downloadUrl(url, filename, _options) {
        if (!createValidAbsoluteUrl(url, "http://example.com")) {
            console.error(`downloadUrl - not a valid URL: ${url}`);
            return; // restricted/invalid URL
        }
        download(url + "#pdfjs.action=download", filename);
    }

    downloadData(data, filename, contentType) {
        const blobUrl = URL.createObjectURL(
            new Blob([data], { type: contentType })
        );
        download(blobUrl, filename);
    }

    /**
     * @returns {boolean} Indicating if the data was opened.
     */
    openOrDownloadData(element, data, filename) {
        const isPdfData = isPdfFile(filename);
        const contentType = isPdfData ? "application/pdf" : "";

        if (
            (typeof PDFJSDev === "undefined" || !PDFJSDev.test("COMPONENTS")) &&
            isPdfData
        ) {
            let blobUrl = this.#openBlobUrls.get(element);
            if (!blobUrl) {
                blobUrl = URL.createObjectURL(
                    new Blob([data], { type: contentType })
                );
                this.#openBlobUrls.set(element, blobUrl);
            }
            let viewerUrl;
            if (typeof PDFJSDev === "undefined" || PDFJSDev.test("GENERIC")) {
                // The current URL is the viewer, let's use it and append the file.
                viewerUrl =
                    "?file=" + encodeURIComponent(blobUrl + "#" + filename);
            } else if (PDFJSDev.test("CHROME")) {
                // In the Chrome extension, the URL is rewritten using the history API
                // in viewer.js, so an absolute URL must be generated.
                viewerUrl =
                    // eslint-disable-next-line no-undef
                    chrome.runtime.getURL("/content/web/viewer.html") +
                    "?file=" +
                    encodeURIComponent(blobUrl + "#" + filename);
            }

            try {
                window.open(viewerUrl);
                return true;
            } catch (ex) {
                console.error(`openOrDownloadData: ${ex}`);
                // Release the `blobUrl`, since opening it failed, and fallback to
                // downloading the PDF file.
                URL.revokeObjectURL(blobUrl);
                this.#openBlobUrls.delete(element);
            }
        }

        this.downloadData(data, filename, contentType);
        return false;
    }

    download(blob, url, filename, _options) {
        const blobUrl = URL.createObjectURL(blob);
        download(blobUrl, filename);
    }
}

export { DownloadManager };
