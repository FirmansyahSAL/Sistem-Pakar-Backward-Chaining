<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['pengetahuan']    = $this->M_Master->jumlah_pengetahuan();
        $data['penyakit']  = $this->M_Master->jumlah_penyakit();
        $data['gejala']   = $this->M_Master->jumlah_gejala();
        $data['users']    = $this->M_karyawan->jumlah_user();
        $this->template->load('back/template', 'back/dashboard', $data);
    }

    function login()
    {
        $this->load->view('back/login');
    }
}
