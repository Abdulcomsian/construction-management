<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        .width100 {
            width: 100%;
            margin-bottom: 20px;
        }

        .inputLabelDiv label {
            display: flex;
            justify-content: center;
        }

        .width50 {
            width: 45%;
        }

        .d-flex {
            display: flex;
            align-items: center;
        }

        .contentDiv {
            width: 100%;
            max-width: 60%;
            margin: auto;
        }

        .inputDiv {
            display: flex;
            align-items: center;
        }

        .inputDiv label {
            width: 50%;
        }

        .width40 .inputLabelDiv {
            width: 45%;
        }

        input {
            width: 95%;
            border: 1px solid rgba(0, 0, 0, 0.28);
            padding: 10px;
            border-radius: 3px;
            background-color: #F4F4F4;
            font-family: 'Outfit', sans-serif;
        }

        .justify-content {
            justify-content: space-between;
        }

        .width40 {
            width: 40%;
        }

        .width60 {
            width: 55%;
        }

        label {
            color: #C5BCBC;
            font-size: 14px;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <section id="pdf_section">
        <div class="contentDiv">
            <h3>Design Brief</h3>
            <div class="width100 d-flex justify-content">
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Project No.:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Date:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>
            <div class="width100 d-flex justify-content">
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Project Name:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Required by Date:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>
            <div class="width100">
                <div class="inputDiv">
                    <label style="width: 16.5%;" for="">Project Address:</label>
                    <input type="text" readonly value="100">
                </div>
            </div>
            <div class="width100">
                <div class="inputDiv">
                    <label style="width: 16.5%;" for="">Designer Company Name:</label>
                    <input type="text" readonly value="100">
                </div>
            </div>
            <div class="width100">
                <div class="inputDiv">
                    <label style="width: 16.5%;" for="">Designer Email Address:</label>
                    <input type="text" readonly value="100">
                </div>
            </div>
            <div class="width100">
                <div class="inputDiv">
                    <label style="width: 16.5%;" for="">TWC Email Address:</label>
                    <input type="text" readonly value="100">
                </div>
            </div>
            <div class="width100 d-flex justify-content">
                <div class="width40 d-flex justify-content">
                    <div class="inputLabelDiv">
                        <label for="">TW Category:</label>
                        <input type="text" readonly value="100">
                    </div>
                    <div class="inputLabelDiv">
                        <label for="">TTW Risk Class:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
                <div class="width60">
                    <div class="inputLabelDiv">
                        <label for="">Design Requirement for:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>

            </div>
            <div class="width100 d-flex justify-content">
                <div class="width40 d-flex justify-content">
                    <label for="">Description of Temporary Works Required</label>
                </div>
                <div class="width60">
                    <div class="inputLabelDiv">
                        <input type="text" readonly value="100">
                    </div>
                </div>

            </div>
            <div class="width100">
                <label for="">Scope of Design Output and date Required fronm the Temporary Works Engineer</label>
                <div class="width100 d-flex justify-content">
                    <div class="inputDiv width50">
                        <input type="text" readonly value="100">
                    </div>
                    <div class="inputDiv width50">
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>
            <div class="width100">
                <div class="width100 d-flex justify-content">
                    <div class="inputDiv width50">
                        <input type="text" readonly value="100">
                    </div>
                    <div class="inputDiv width50">
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>
            <div class="width100">
                <label for="">Attachments / Spec / Existing Designs and Existing Site Conditions (folders to
                    upload)</label>
                <div class="width100 d-flex justify-content">
                    <div class="inputDiv width100">
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>
            <div class="width100 d-flex justify-content">
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Name:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Signiture:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>
            <div class="width100 d-flex justify-content">
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Job Title:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>
            <div class="width100 d-flex justify-content">
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Company:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
                <div class="width50">
                    <div class="inputDiv">
                        <label for="">Date:</label>
                        <input type="text" readonly value="100">
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>