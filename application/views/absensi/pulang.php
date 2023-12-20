<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div id="reader" width="600px"></div>

    <h2><?= date('Y-m-d H:i:s') ?></h2>

</div>
<!-- /.container-fluid -->

<script src="<?= base_url('assets/'); ?>js/html5-qrcode.min.js" type="text/javascript"></script>
<script>
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        const urlGet = '<?= base_url('absensi/getbynip/') ?>' + decodedText
        const urlPost = '<?= base_url('absensi/inpplg/') ?>'

        $.getJSON(urlGet, function(data) {
            const pegawaiId = data.id
            // console.log(data.id)
            $.post(urlPost, {
                pegawaiId: pegawaiId
            }, function(data) {
                document.location.href = "<?= base_url('absensi/harian') ?>"
            })
        })

        // ...
        html5QrcodeScanner.clear();
        // ^ this will stop the scanner (video feed) and clear the scan area.
    }

    html5QrcodeScanner.render(onScanSuccess);
</script>