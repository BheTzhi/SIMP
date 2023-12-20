<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">
        <div class="col-lg-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="lama">Password Lama</label>
                    <input type="password" class="form-control" name="lama" id="lama">
                </div>
                <?= form_error('lama', '<small class="text-danger pl-3">', '</small>'); ?>

                <div class="form-group">
                    <label for="baru">Password Baru</label>
                    <input type="password" class="form-control" name="baru" id="baru">
                </div>
                <?= form_error('baru', '<small class="text-danger pl-3">', '</small>'); ?>

                <div class="form-group">
                    <label for="rbaru">Ulangi Password</label>
                    <input type="password" class="form-control" name="rbaru" id="rbaru">
                </div>
                <?= form_error('rbaru', '<small class="text-danger pl-3">', '</small>'); ?>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
            </form>


        </div>
    </div>


</div>
<!-- /.container-fluid -->