<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget ">
                    <div class="widget-header">
                        <i class="icon-user"></i>
                        <h3>Profile Karyawan</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <div class="tab table">
                            <br>

                            <div class="tab-content">
                                <div id="edit-profile" class="form-horizontal">
                                    <fieldset>

                                        <div class="control-group">

                                            <?= $this->session->flashdata('message') ?>
                                            <?= validation_errors() ?>
                                            <form action="<?= base_url('karyawan/update_profile') ?>" method="post">

                                                <label class="control-label">Nik</label>
                                                <div class="controls">
                                                    <input type="hidden" name="id_users" value="<?= $karyawan->id_users ?>" class="span4" placeholder="NIK">
                                                    <input type="text" readonly name="nik" value="<?= $karyawan->nik ?>" class="span4" placeholder="NIK">
                                                </div> <!-- /controls -->
                                                <br>

                                                <label class="control-label">Username</label>
                                                <div class="controls">
                                                    <input type="text" name="username" value="<?= $karyawan->username ?>" class="span4" placeholder="Username">
                                                </div>
                                                <br>

                                                <label class="control-label">Email</label>
                                                <div class="controls">
                                                    <input type="text" name="email" value="<?= $karyawan->email ?>" class="span4" placeholder="Email">
                                                </div>
                                                <br>

                                                <label class="control-label">Jabatan</label>
                                                <div class="controls">
                                                    <select name="jabatan_id" class="span4">
                                                        <option value="">---Pilih Jabatan---</option>
                                                        <?php foreach ($jabatan as $key => $row) { ?>

                                                            <option value="<?= $row->id_jabatan ?>" <?= $row->id_jabatan == $karyawan->jabatan_id ? "selected" : null ?>>
                                                                <?= $row->jabatan ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                                <br>

                                                <label class="control-label">Divisi</label>
                                                <div class="controls">
                                                    <select name="divisi_id" class="span4">
                                                        <option value="">---Pilih Divisi---</option>
                                                        <?php foreach ($divisi as $key => $row) { ?>

                                                            <option value="<?= $row->id_divisi ?>" <?= $row->id_divisi == $karyawan->divisi_id ? "selected" : null ?>>
                                                                <?= $row->divisi ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <p>&nbsp;</p>
                                                <label class="control-label">status user</label>
                                                <div class="controls">
                                                    <select name="divisi_id" class="span4">
                                                        <option value="">---Pilih Divisi---</option>
                                                        <?php foreach ($divisi as $key => $row) { ?>

                                                            <option value="<?= $row->id_divisi ?>" <?= $row->id_divisi == $karyawan->divisi_id ? "selected" : null ?>>
                                                                <?= $row->divisi ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <p>&nbsp;</p>


                                                <label class="control-label">level user</label>
                                                <div class="controls">
                                                    <input type="text" name="level_user" value="<?= $karyawan->level_user ?>" class="span4" placeholder="Email">
                                                </div>
                                                <p>&nbsp;</p>

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