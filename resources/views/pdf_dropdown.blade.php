<select id="myDropdown" onchange="openModalOnDropdownChange()">
    <option value="">Select PDF</option>
    <option value="http://127.0.0.1:8000/pdf/test.pdf">Test</option>
    <option value="http://127.0.0.1:8000/pdf/test2.pdf">Test PDF 2</option>
    <!-- Add more options as needed -->
</select>

<script>
    function openModalOnDropdownChange() {
        // Get the selected option value
        var selectedValue = document.getElementById("myDropdown").value;
        
        // Check if a valid option is selected (not the default "Select PDF" option)
        if (selectedValue !== "") {
            const dropdown = document.getElementById("myDropdown");
    
            localStorage.setItem("selectedPDFPath", selectedValue);
        
            // Redirect to the selected PDF URL
                var pdfUrl = "{{ route('get_pdf_code') }}";
                window.open(pdfUrl, '_blank');
        }
    }
</script>
