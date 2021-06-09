<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Profile Karyawan</h3>

                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <?= validation_errors() ?>
                    <form action="<?= base_url('karyawan/update_password') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">old password</label>
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="id_users" class="form-control" value="<?= $karyawan->id_users ?>" placeholder="NIK">
                                        <input type="password" readonly name="password" class="form-control" value="<?= $karyawan->password ?>" placeholder="NIK">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-address-card"></span>
                                            </div> <!-- /controls -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-label">New password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-user"></span>
                                            </div> <!-- /controls -->
                                        </div>
                                    </div>

                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- /.card-body -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div> <!-- /form-actions -->
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>