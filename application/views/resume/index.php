<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <form action="<?= base_url('resume/getdata') ?>" method="get">
        <div class="row col-lg-12">
            <div class="form-group col-md-3">
                <label for="jenis">Pilih Jenis</label>
            </div>

            <div class="form-group col-md-3">
                <label class="zzz2" style="display: none;" for="bulan">Pilih Bulan</label>
            </div>

            <div class="form-group col-md-3">
                <label class="zzz" style="display: none;" for="tahun">Pilih Tahun</label>
            </div>

            <div class="form-group col-md-3">

            </div>

            <div class="form-group col-md-3">
                <select name="jenis" id="jenis" class="custom-select">
                    <option value="" selected>- Pilih -</option>
                    <option value="air"> Air </option>
                    <option value="listrik"> Listrik </option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <select style="display: none;" name="bulan" id="bulan" class="custom-select zzz2">
                    <option value="" selected>- Bulan -</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <select style="display: none;" name="tahun" id="tahun" class="custom-select zzz">
                    <option value="" selected>- Tahun -</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <button style="display: none;" type="submit" class="btn btn-success zzz2"><i class="fas fa-fw fa-search"></i> Lihat</button>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->