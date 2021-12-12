<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Gejala</h3>
                    </div>
                    <div class="card-body">

                        <?= validation_errors() ?>
                        <form action="<?= base_url('gejala/edit') ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1">kode Gejala</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="kd_gejala" value="<?php echo $baris['kd_gejala'] ?>" readonly="true" placeholder="Enter penyakit">
                            </div>

                            <div class="form-group">
                                <label>Nama Gejala</label>
                                <textarea class="form-control" name="nama_gejala" type="text"><?php print $baris['nama_gejala']; ?></textarea>

                            </div>
                            <div class="form-group">
                                <label>Poin Gejala</label>
                                <textarea class="form-control" name="poin_gejala" type="text"><?php print $baris['poin_gejala']; ?></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>