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
                        <h3 class="card-title">Form Penyakit</h3>
                    </div>
                    <div class="card-body">

                        <?= validation_errors() ?>
                        <form action="<?= base_url('penyakit/tambahpenyakit') ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1">kode Penyakit</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="kd_penyakit" value="<?php echo $kd_penyakit ?>" readonly="true" placeholder="Enter penyakit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Penyakit</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_penyakit" placeholder="Enter penyakit">
                            </div>
                            <div class="form-group">
                                <label>Penyebab</label>
                                <textarea class="form-control" name="penyebab" type="text" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Solusi</label>
                                <textarea class="form-control" name="solusi" type="text" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="img_gejala" class="form-control" required="">
                                <div class="input-group-append">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>