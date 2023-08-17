/* Copyright 2022 Mozilla Foundation
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

import { AnnotationEditorParamsType } from "pdfjs-lib";

class AnnotationEditorParams {
  /**
   * @param {AnnotationEditorParamsOptions} options
   * @param {EventBus} eventBus
   */
  constructor(options, eventBus) {
    this.eventBus = eventBus;
    this.#bindListeners(options);
  }

  #bindListeners({
    editorFreeTextFontSize,
    editorFreeTextColor,
    editorInkColor,
    editorInkThickness,
    editorInkOpacity,
    editorInk2Color,
    editorInk2Thickness,
    editorRectColor,
    editorRectOpacity,
    editorRectThickness,
  }) {
    const dispatchEvent = (typeStr, value) => {
      this.eventBus.dispatch("switchannotationeditorparams", {
        source: this,
        type: AnnotationEditorParamsType[typeStr],
        value,
      });
    };
    editorFreeTextFontSize.addEventListener("input", function () {
      dispatchEvent("FREETEXT_SIZE", this.valueAsNumber);
    });
    editorFreeTextColor.addEventListener("input", function () {
      dispatchEvent("FREETEXT_COLOR", this.value);
    });
    editorInkColor.addEventListener("input", function () {
      dispatchEvent("INK_COLOR", this.value);
    });
    editorInkThickness.addEventListener("input", function () {
      dispatchEvent("INK_THICKNESS", this.valueAsNumber);
    });
    editorInkOpacity.addEventListener("input", function () {
      dispatchEvent("INK_OPACITY", this.valueAsNumber);
    });
    editorInk2Color.addEventListener("input", function () {
      dispatchEvent("INK2_COLOR", this.value);
    });
    editorInk2Thickness.addEventListener("input", function () {
      dispatchEvent("INK2_THICKNESS", this.valueAsNumber);
    });
    editorRectColor.addEventListener("input", function () {
      dispatchEvent("RECT_COLOR", this.value);
    });
    editorRectThickness.addEventListener("input", function () {
      dispatchEvent("RECT_THICKNESS", this.valueAsNumber);
    });
    editorRectOpacity.addEventListener("input", function () {
      dispatchEvent("RECT_OPACITY", this.valueAsNumber);
    });

    this.eventBus._on("annotationeditorparamschanged", evt => {
      for (const [type, value] of evt.details) {
        switch (type) {
          case AnnotationEditorParamsType.FREETEXT_SIZE:
            editorFreeTextFontSize.value = value;
            break;
          case AnnotationEditorParamsType.FREETEXT_COLOR:
            editorFreeTextColor.value = value;
            break;
          case AnnotationEditorParamsType.INK_COLOR:
            editorInkColor.value = value;
            break;
          case AnnotationEditorParamsType.INK_THICKNESS:
            editorInkThickness.value = value;
            break;
          case AnnotationEditorParamsType.INK_OPACITY:
            editorInkOpacity.value = value;
            break;
          case AnnotationEditorParamsType.INK2_COLOR:
            editorInk2Color.value = value;
            break;
          case AnnotationEditorParamsType.INK2_THICKNESS:
            editorInk2Thickness.value = value;
            break;
          case AnnotationEditorParamsType.RECT_COLOR:
            editorRectColor.value = value;
            break;
          case AnnotationEditorParamsType.RECT_THICKNESS:
            editorRectThickness.value = value;
            break;
          case AnnotationEditorParamsType.RECT_OPACITY:
            editorRectOpacity.value = value;
            break;
        }
      }
    });
  }
}

export { AnnotationEditorParams };
