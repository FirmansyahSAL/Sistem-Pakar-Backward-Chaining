<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }


    public function index()
    {
        $data['karyawan'] = $this->M_karyawan->get_karyawan();

        $this->template->load('back/template', 'back/karyawan/data_karyawan', $data);
    }

    function add_tiket()
    {
    }

    function save_tiket()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($_FILES['gambar_tiket']['error'] <> 4) {

                $config['upload_path'] = './assets/images/tiket/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $nama_file = $this->input->post('nik') . date('Ymdhis');
                $config['file_name'] = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_tiket')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');
                    $this->index();
                } else {
                    $gambar_tiket = $this->upload->data();

                    $data = array(
                        'nik'               => $this->input->post('nik'),
                        'username'          => $this->input->post('username'),
                        'email'             => $this->input->post('email'),
                        'jabatan_id'        => $this->input->post('jabatan_id'),
                        'divisi_id'         => $this->input->post('divisi_id'),
                        'password'          => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'status_user'       => 1,
                        'level_user'        => 1,

                    );

                    $this->M_karyawan->insert($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di simpan</div>');
                    redirect('karyawan', 'refresh');
                }
            } else {
                $data = array(

                    'nik'               => $this->input->post('nik'),
                    'username'          => $this->input->post('username'),
                    'email'             => $this->input->post('email'),
                    'jabatan_id'        => $this->input->post('jabatan_id'),
                    'divisi_id'         => $this->input->post('divisi_id'),
                    'password'          => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'status_user'       => 1,
                    'level_user'        => 1,

                );

                $this->M_karyawan->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info"> Data Berhasil di simpan</div>');
                redirect('karyawan', 'refresh');
            }
        }
    }

    function add_karyawan()
    {
        $data['jabatan'] = $this->M_jabatan->get_jabatan();
        $data['divisi'] = $this->M_divisi->get_divisi();
        $this->template->load('back/template', 'back/karyawan/formkaryawan', $data);
    }

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
                'nik'               => $this->input->post('nik'),
                'username'          => $this->input->post('username'),
                'email'             => $this->input->post('email'),
                'jabatan_id'        => $this->input->post('jabatan_id'),
                'divisi_id'         => $this->input->post('divisi_id'),
                'password'          => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'status_user'       => 1,
                'level_user'        => 1,
            );

            $this->M_karyawan->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info"> Data Berhasil disimpan </div>');
            redirect('karyawan', 'refresh');
        } else {
            $this->add_karyawan();
        }
    }

    function edit_karyawan($id)
    {
        $data['users'] = $this->M_karyawan->get_id_user($id);
        if ($data['users']) {
            $data['jabatan'] = $this->M_jabatan->get_jabatan();
            $data['divisi'] = $this->M_divisi->get_divisi();
            $this->template->load('back/template', 'back/karyawan/edit_karyawan', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data tidak ada</div>');
            redirect('karyawan', 'refresh');
        }
    }

    function update_karyawan()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');

        $this->form_validation->set_message('valid_email', '{field} anda harus valid');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nik'          => $this->input->post('nik'),
                'username'     => $this->input->post('username'),
                'email'        => $this->input->post('email'),
                'jabatan_id'     => $this->input->post('jabatan_id'),
                'divisi_id'     => $this->input->post('divisi_id'),
                'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'status_user'  => $this->input->post('status_user'),
                'level_user'   => $this->input->post('level_user'),
            );

            $this->M_karyawan->update($this->input->post('id_users'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info"> Data Berhasil diupdate </div>');

            redirect('karyawan', 'refresh');
        } else {

            $this->add_karyawan();
        }
    }

    function delete_karyawan($id)
    {
        $delete = $this->M_karyawan->get_id_karyawan($id);
        if ($delete) {
            $this->M_karyawan->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info"> Data Berhasil dihapus</div>');
            redirect('karyawan', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info"> Data Tidak ada</div>');
            redirect('karyawan', 'refresh');
        }
    }

    function profile($id)
    {
        $data['karyawan'] = $this->M_karyawan->get_id_karyawan($id);

        if ($data['karyawan']) {
            $data['title'] = 'Profile User';
            $data['jabatan'] = $this->M_jabatan->get_jabatan();
            $data['divisi'] = $this->M_divisi->get_divisi();


            $this->template->load('back/template', 'back/profile', $data);
        } else {
            redirect('dashboard', 'refresh');
        }
    }

    function update_profile()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nik'          => $this->input->post('nik'),
                'username'     => $this->input->post('username'),
                'email'        => $this->input->post('email'),
                'jabatan_id'     => $this->input->post('jabatan_id'),
                'divisi_id'     => $this->input->post('divisi_id'),
                'status_user'     => $this->input->post('status_user'),
                'level_user'     => $this->input->post('level_user'),
            );

            $this->M_karyawan->update($this->input->post('id_users'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil diupdate </div>');

            redirect('karyawan/profile/' . $this->session->id_users);
        } else {

            $this->add_karyawan();
        }
    }
}
