<?php

class Penyakit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penyakit');
        cek_login();
    }

    function index()
    {
        $data = array('data_penyakit' => $this->M_penyakit->getAllPenyakit());

        $this->template->load('back/template', 'back/penyakit/data_penyakit', $data);
    }

    function add()
    {
        $data = array(
            'kd_penyakit' => $this->M_penyakit->getKodePenyakit(),
            'data_penyakit' => $this->M_penyakit->getAllPenyakit()
        );
        $this->template->load('back/template', 'back/penyakit/form_penyakit', $data);
    }

    //    ===================== INSERT =====================

    function tambahPenyakit()
    {
        $data = array(
            'kd_penyakit' => $this->M_penyakit->getKodePenyakit(),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'penyebab' => $this->input->post('penyebab'),
            'solusi' => $this->input->post('solusi'),
        );
        if (!empty($_FILES['img_gejala']['name'])) {
            $img_gejala = $this->upload();
            $data['img_gejala'] = $img_gejala;
        }
        $this->M_penyakit->insertPenyakit($data);
        redirect('penyakit');
    }
    function upload()
    {
        $image_name = time() . '-' . $_FILES["img_gejala"]['name'];

        $config['upload_path']         = 'assets/images/perangkat/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']         = '';
        $config['max_widht']         = '';
        $config['max_height']          = '';
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('img_gejala')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('penyakit');
        }
        return $this->upload->data('file_name');
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
            $this->M_penyakit->updatePenyakit($data, $id);
            redirect('penyakit');
        } else {
            $id = $this->uri->segment(3);
            $data['baris'] = $this->M_penyakit->getPenyakitById($id)->row_array();
            $this->template->load('back/template', 'back/penyakit/edit_penyakit', $data);
        }
    }
    //    ========================== DELETE =======================
    function hapusPenyakit()
    {
        $id = $this->uri->segment(3);
        $this->M_penyakit->deletePenyakit($id);
        redirect("penyakit");
    }
}
