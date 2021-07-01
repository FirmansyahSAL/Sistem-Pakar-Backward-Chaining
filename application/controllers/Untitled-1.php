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
                                            <option value="1" <?= $karyawan->level_user == '1' ? 'selected' : '' ?>>IT</option>
                                            <option value="2" <?= $karyawan->level_user == '2' ? 'selected' : '' ?>>Staff</option>
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
                                                <option value="1" <?= $karyawan->status_user == '1' ? 'selected' : '' ?>>Active</option>
                                                <option value="0" <?= $karyawan->status_user == '0' ? 'selected' : '' ?>>Non Active</option>
                                            </select>
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



function save_karyawan()
{
$this->form_validation->set_rules('nik', 'Nik', 'trim|is_unique[users.nik]|required');
$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|required');
$this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|required');
$this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|matches[password]|required');

$this->form_validation->set_message('required', '{field} Harus di isi');
$this->form_validation->set_message('valid_email', '{field} anda harus valid');

$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

if ($this->form_validation->run() == TRUE) {

$data = array(
'nik' => $this->input->post('nik'),
'username' => $this->input->post('username'),
'email' => $this->input->post('email'),
'jabatan_id' => $this->input->post('jabatan_id'),
'divisi_id' => $this->input->post('divisi_id'),
'status_user' => 1,
'level_user' => 1,
'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),

);

$this->M_karyawan->insert($data);
$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil diupdate </div>');

redirect('karyawan/profile/' . $this->session->id_users);
} else {

$this->add_karyawan();
}
}