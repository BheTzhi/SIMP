<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>qrcode.js">
    </script>
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>html5-qrcode.js">
    </script>
    <style type="text/css" media="screen">
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <form name="QRform" id="QRform">
        <textarea name="textField" rows="8" cols="70" onkeyup='updateQRCode(this.value)' onclick="this.focus();this.select();">Tutorialspoint.com.</textarea>
    </form>

    <!-- This is where our QRCode will appear in. -->
    <div id="qrcode"></div>

    <script type="text/javascript">
        function updateQRCode(text) {

            var element = document.getElementById("qrcode");

            var bodyElement = document.body;
            if (element.lastChild)
                element.replaceChild(showQRCode(text), element.lastChild);
            else
                element.appendChild(showQRCode(text));

        }

        // updateQRCode('www.tutorialspoint.com');
    </script>
</body>

</html>