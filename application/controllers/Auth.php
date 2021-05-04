<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
    }

    function login()
    {
        $this->load->view('back/login');
    }


    function register()
    {
        $this->load->view('back/register');
    }

    function proses_register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'valid_email|is_unique[users.email]|required');
        $this->form_validation->set_rules('password', 'password', 'trim|min_length[5]required');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|matches[password]|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('valid_email', '{field} anda harus valid');
        $this->form_validation->set_message('min_length', '{field} anda minimal 5 karakter');
        $this->form_validation->set_message('matches', '{field} anda tidak sama');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'status' => 1,
                'level_user' => 1,
            );
            //var_dump($data);

            $this->M_auth->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info"> Data Berhasil disimpan</div>');
            redirect('auth/login', 'refresh');
        } else {
            $this->load->view('back/register');
        }
    }
}
