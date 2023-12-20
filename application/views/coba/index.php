<?= form_open_multipart() ?>
<div class="container absen">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama[]" id="nama[]" class="form-control">
    </div>
    <div class="form-group">
        <label for="masuk">Masuk</label>
        <input type="text" name="masuk[]" id="masuk[]" class="form-control">
    </div>
    <div class="form-group">
        <label for="izin">Izin</label>
        <input type="text" name="izin[]" id="izin[]" class="form-control">
    </div>
    <div class="form-group">
        <label for="sakit">Sakit</label>
        <input type="text" name="sakit[]" id="sakit[]" class="form-control">
    </div>
    <div class="form-group">
        <label for="alpa">Alpa</label>
        <input type="text" name="alpa[]" id="alpa[]" class="form-control">
    </div>
    <hr>
</div>
<?= form_close() ?>