<?php

class Gejala extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Master');
    }
    function index()
    {
        $data = array('data_gejala' => $this->M_Master->getAllGejala());

        $this->template->load('back/template', 'back/gejala/data_gejala', $data);
    }

    function add()
    {
        $data = array(
            'kd_gejala' => $this->M_Master->getKodeGejala(),
            'data_gejala' => $this->M_Master->getAllGejala()
        );
        $this->template->load('back/template', 'back/gejala/form_gejala', $data);
    }

    //    ======================== INSERT =======================

    function tambahGejala()
    {
        $data = array(
            'kd_gejala' => $this->M_Master->getKodeGejala(),
            'nama_gejala' => $this->input->post('nama_gejala'),
            'poin_gejala' => $this->input->post('poin_gejala')
        );
        $this->M_Master->insertGejala($data);
        redirect("gejala");
    }

    //    ======================== EDIT =======================

    function edit()
    {
        if (isset($_POST['submit'])) {
            // proses edit
            $id            =   $this->input->post('kd_gejala');
            $gejala   =   $this->input->post('nama_gejala');
            $poin   =   $this->input->post('poin_gejala');
            $data        =    array(
                'nama_gejala' => $gejala,
                'poin_gejala' => $poin
            );
            $this->M_Master->updateGejala($data, $id);
            redirect('gejala');
        } else {
            $id = $this->uri->segment(3);
            $data['baris'] = $this->M_Master->getGejalaById($id)->row_array();
            $this->template->load('back/template', 'back/gejala/edit_gejala', $data);
        }
    }
    //    ======================== DELETE =======================
    function hapusGejala()
    {
        $id = $this->uri->segment(3);
        $this->M_Master->deleteGejala($id);
        redirect("gejala");
    }
}
