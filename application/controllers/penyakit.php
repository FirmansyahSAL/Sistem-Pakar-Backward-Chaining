<?php

class penyakit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Master');
        cek_login();
    }

    function index()
    {
        $data = array('data_penyakit' => $this->M_Master->getAllPenyakit());

        $this->template->load('back/template', 'back/penyakit/data_penyakit', $data);
    }

    function add()
    {
        $data = array(
            'kd_penyakit' => $this->M_Master->getKodePenyakit(),
            'data_penyakit' => $this->M_Master->getAllPenyakit()
        );
        $this->template->load('back/template', 'back/penyakit/form_penyakit', $data);
    }

    //    ===================== INSERT =====================

    function tambahPenyakit()
    {
        $data = array(
            'kd_penyakit' => $this->M_Master->getKodePenyakit(),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'penyebab' => $this->input->post('penyebab'),
            'solusi' => $this->input->post('solusi')
        );
        $this->M_Master->insertPenyakit($data);
        redirect("penyakit");
    }

    //    ======================== EDIT =======================

    function edit()
    {
        if (isset($_POST['submit'])) {
            // proses edit
            $id            =   $this->input->post('kd_penyakit');
            $penyakit   =   $this->input->post('nama_penyakit');
            $penyebab    =   $this->input->post('penyebab');
            $solusi        =   $this->input->post('solusi');
            $data        =    array(
                'nama_penyakit' => $penyakit,
                'penyebab' => $penyebab,
                'solusi' => $solusi
            );
            $this->M_Master->updatePenyakit($data, $id);
            redirect('penyakit');
        } else {
            $id = $this->uri->segment(3);
            $data['baris'] = $this->M_Master->getPenyakitById($id)->row_array();
            $this->template->load('back/template', 'back/penyakit/edit_penyakit', $data);
        }
    }
    //    ========================== DELETE =======================
    function hapusPenyakit()
    {
        $id = $this->uri->segment(3);
        $this->M_Master->deletePenyakit($id);
        redirect("penyakit");
    }
}
