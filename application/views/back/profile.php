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
                                <div class="form-group">
                                    <label class="control-label">Nik</label>
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="id_users" class="form-control" value="<?= $karyawan->id_users ?>" placeholder="NIK">
                                        <input type="text" readonly name="nik" class="form-control" value="<?= $karyawan->nik ?>" placeholder="NIK">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-address-card"></span>
                                            </div> <!-- /controls -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label class="control-label">Nama Karyawan</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="username" value="<?= $karyawan->username ?>" class="form-control" placeholder="Username">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="email" value="<?= $karyawan->email ?>" class="form-control" placeholder="Email">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-envelope"></span>
                                            </div> <!-- /controls -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Divisi</label>
                                        <div class="input-group mb-3">
                                            <select name="divisi_id" class="form-control ">
                                                <option value="">---Pilih Divisi---</option>
                                                <?php foreach ($divisi as $key => $row) { ?>

                                                    <option value="<?= $row->id_divisi ?>" <?= $row->id_divisi == $karyawan->divisi_id ? "selected" : null ?>>
                                                        <?= $row->divisi ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <div class="input-group-append">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Jabatan</label>
                                    <div class="input-group mb-3">
                                        <select name="jabatan_id" class="form-control">
                                            <option value="">---Pilih Jabatan---</option>
                                            <?php foreach ($jabatan as $key => $row) { ?>

                                                <option value="<?= $row->id_jabatan ?>" <?= $row->id_jabatan == $karyawan->jabatan_id ? "selected" : null ?>>
                                                    <?= $row->jabatan ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">level user</label>
                                    <div class="input-group mb-3">
                                        <select name="level_user" class="form-control">
                                            <option value="">Level User</option>
                                            <?php if ($row->level_user == '1') {
                                                echo 'Active';
                                            } else {
                                                echo 'Non Active';
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class=" col-md-3">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label">status user</label>
                                        <div class="input-group mb-3">
                                            <select name="status_user" class="form-control">
                                                <option value="">---Pilih status user---</option>
                                                <?php if ($row->status_user == '1') {
                                                    echo 'Active';
                                                } else {
                                                    echo 'Non Active';
                                                } ?>
                                            </select>
                                            <div class="input-group-append">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="<?= base_url('karyawan/add_tiket') ?>" data-toggle="modal" data-target="#form_tiket" class="btn btn-info">Ganti Password</a>
                            <a href="<?= base_url('karyawan/add_tiket') ?>" data-toggle="modal" data-target="#form_tiket2" class="btn btn-success">Update Foto</a>

                        </div> <!-- /form-actions -->
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="form_tiket">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                Form Edit Password <aria-label="Close" button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>

            </div>
            <div class="modal-body">
                <form action="<?= base_url('karyawan/save_tiket') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="username" value="<?= $karyawan->nik ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>New password</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter">

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
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
                        <input type="text" name="nik" value="<?= $karyawan->nik ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>foto</label><br>
                        <input type="file" name="gambar_tiket">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>