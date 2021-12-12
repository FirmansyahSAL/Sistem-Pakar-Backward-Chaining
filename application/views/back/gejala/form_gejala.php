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
                        <h3 class="card-title">Form Gejala</h3>
                    </div>
                    <div class="card-body">

                        <?= validation_errors() ?>
                        <form action="<?= base_url('gejala/tambahgejala') ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1">kode Gejala</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="kd_gejala" value="<?php echo $kd_gejala ?>" readonly="true">
                            </div>
                            <div class="form-group">
                                <label>Gejala</label>
                                <textarea class="form-control" name="nama_gejala" type="text" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Poin Gejala</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="poin_gejala" placeholder="Enter gejala">
                            </div>


                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>