<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Profile Karyawan</h3>
                    </div>

                    <div class="card-body">

                        <?= $this->session->flashdata('message') ?>
                        <?= validation_errors() ?>
                        <form action="<?= base_url('karyawan/update_profile') ?>" method="post">

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

                            <label class="control-label">Username</label>
                            <div class="input-group mb-3">
                                <input type="text" name="username" value="<?= $karyawan->username ?>" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-user"></span>
                                    </div> <!-- /controls -->
                                </div>
                            </div>

                            <label class="control-label">Email</label>
                            <div class="input-group mb-3">
                                <input type="text" name="email" value="<?= $karyawan->email ?>" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-envelope"></span>
                                    </div> <!-- /controls -->
                                </div>
                            </div>

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

                            <label class="control-label">Divisi</label>
                            <div class="input-group mb-3">
                                <select name="divisi_id" class="form-control">
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

                            <label class="control-label">status user</label>
                            <div class="input-group mb-3">
                                <input type="text" name="status_user" value="<?= $karyawan->status_user ?>" class="form-control">
                                <div class="input-group-append">
                                </div>
                            </div>


                            <label class="control-label">level user</label>
                            <div class="input-group mb-3">
                                <input type="text" name="level_user" value="<?= $karyawan->level_user ?>" class="form-control">
                                <div class="input-group-append">
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div> <!-- /form-actions -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <br>
        </div> <!-- /widget-content -->
</div> <!-- /widget -->
</div> <!-- /span8 -->
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /main-inner -->