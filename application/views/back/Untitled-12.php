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
                    <form action="<?= base_url('karyawan/update_profile') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">

                                <div class=" col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label">status user</label>
                                            <div class="input-group mb-3">
                                                <select name="status_user" class="form-control">
                                                    <option value="1" <?= $karyawan->status_user == '1' ? 'selected' : '' ?>>Active</option>
                                                    <option value="0" <?= $karyawan->status_user == '0' ? 'selected' : '' ?>>Non Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>


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

                            <!-- /.card-body -->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="<?= base_url('karyawan/ganti/' . $this->session->id_users); ?>" class="btn btn-info">Ganti Password</a>
                                <a href="<?= base_url('karyawan/add_tiket') ?>" data-toggle="modal" data-target="#form_tiket2" class="btn btn-success">Update Foto</a>

                            </div> <!-- /form-actions -->
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="form_tiket2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                Form Ganti Foto <aria-label="Close" button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>

            </div>
            <div class="modal-body">
                <form action="<?= base_url('karyawan/save_tiket') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nik</label>
                        <input type="text" name="username" value="<?= $karyawan->nik ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>foto</label><br>
                        <input type="file" name="image_user">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>