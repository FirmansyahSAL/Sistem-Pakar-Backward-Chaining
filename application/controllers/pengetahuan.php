<?php

class Pengetahuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Master');
    }
    //    ======================== INDEX =======================

    function index()
    {
        $data = array(
            'data_pengetahuan' => $this->M_Master->getAllGejala(),
            'data_penyakit' => $this->M_Master->getAllPenyakit()
        );
        $this->template->load('back/template', 'back/pengetahuan/data_pengetahuan', $data);
    }


    function add()
    {
        $data = array(
            'kd_gejala' => $this->M_Master->getKodeGejala(),
            'data_penyakit' => $this->M_Master->getAllPenyakit(),
            'data_gejala' => $this->M_Master->getAllGejala()
        );
        $this->template->load('back/template', 'back/pengetahuan/form_pengetahuan', $data);
    }

    function detail()
    {
        $id = $this->uri->segment(3);
        $data['detail'] = $this->M_Master->getPengetahuanById($id);
        $this->template->load('back/template', 'back/pengetahuan/detail_pengetahuan', $data);
    }

    //    ======================== INSERT =======================

    function tambahPengetahuan()
    {
        $data = array(
            'kd_pengetahuan' => $this->M_Master->getKodePengetahuan(),
            'kd_penyakit' => $this->input->post('kd_penyakit'),
            'kd_gejala' => $this->input->post('kd_gejala'),
            'pertanyaan' => $this->input->post('pertanyaan')
        );
        $this->M_Master->insertPengetahuan($data);
        redirect("pengetahuan");
    }

    //    ======================== EDIT =======================

    function edit()
    {
        if (isset($_POST['submit'])) {
            // proses edit
            $id            =   $this->input->post('kd_pengetahuan');
            $penyakit   =   $this->input->post('kd_penyakit');
            $gejala        =   $this->input->post('kd_gejala');
            $pertanyaan    =   $this->input->post('pertanyaan');
            $data        =    array(
                'kd_penyakit' => $penyakit,
                'kd_gejala' => $gejala,
                'pertanyaan' => $pertanyaan
            );
            $this->M_Master->updatePengetahuan($data, $id);
            redirect('pengetahuan');
        } else {
            $id = $this->uri->segment(3);
            $data = array(
                'data_penyakit' => $this->M_Master->getAllPenyakit(),
                'data_gejala' => $this->M_Master->getAllGejala()
            );
            $data['baris'] = $this->M_Master->getDPengetahuanById($id)->row_array();
            $this->template->load('back/template', 'back/pengetahuan/edit_pengetahuan', $data);
        }
    }
}
