<!DOCTYPE html>
<html>

<head>
    <style>
        .outer-border {
            width: 595px;
            /* A4 width in pixels */
            height: 842px;
            /* A4 height in pixels */
            padding: 20px;
            text-align: center;
            border: 10px solid #673AB7;
            margin: 0 auto;
            /* Center the certificate */
            box-sizing: border-box;
        }

        .inner-dotted-border {
            width: 555px;
            /* Width with inner padding */
            height: 802px;
            /* Height with inner padding */
            padding: 20px;
            text-align: center;
            border: 5px solid #673AB7;
            border-style: dotted;
            box-sizing: border-box;
        }

        .certification {
            font-size: 50px;
            font-weight: bold;
            color: #663ab7;
        }

        .certify {
            font-size: 25px;
        }

        .name {
            font-size: 30px;
            color: green;
        }

        .fs-30 {
            font-size: 30px;
        }

        .fs-20 {
            font-size: 20px;
        }

        .signature-line {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 150px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            border-top: 1px solid #000;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="outer-border">
        <div class="inner-dotted-border">
            <br /><br /><br />
            <span class="certification">Certificate of Completion</span>
            <br><br><br />
            <span class="certify"><i>is hereby granted to</i></span>
            <br><br><br />
            <span class="name"><b>{{name}}</b></span>
            <br /><br /><br />
            <span class="certify"><i>has successfully completed the certification</i></span>
            <br /><br /><br />
            <span class="certify"><i>dated</i></span><br><br /><br />

            <span class="fs-30">{{time}}</span>

            <div class="signature-line"></div>
            <span class="fs-20">Signature</span>

        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>