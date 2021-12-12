<?php
class Konsultasi extends CI_Controller
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
            'title' => 'Halaman Home',
            'data_pengetahuan' => $this->M_Master->getAllGejala(),
            'data_penyakit' => $this->M_Master->getAllPenyakit()
        );
        $this->db->empty_table('tmp_relasi');
        $this->db->empty_table('tmp_hasil');
        $this->template->load('back/front', 'back/konsultasi', $data);
    }
    function pertanyaan()
    {
        $data = array(
            'title' => 'Halaman Pertanyaan',
            'record' => $this->M_Master->getPenyakit(),
            'relasi' => $this->M_Master->getRelasi()
        );
        $this->template->load('back/front', 'back/pertanyaan', $data);
    }
    function tambahrelasi()
    {
        $this->M_Master->simpanRelasi();
        redirect('konsultasi/pertanyaan');
    }
    function tambahhasil()
    {
        $this->form_validation->set_rules('kd_penyakit[]', 'kd_penyakit', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kd_gejala[]', 'kd_gejala', 'required|trim|xss_clean');
        $this->form_validation->set_rules('poin_gejala[]', 'poin_gejala', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors(); // tampilkan apabila ada error
        } else {

            $nm = $this->input->post('kd_penyakit');
            $result = array();
            foreach ($nm as $key => $val) {
                $result[] = array(
                    "kd_penyakit"  => $_POST['kd_penyakit'][$key],
                    "kd_gejala"  => $_POST['kd_gejala'][$key],
                    "poin_gejala"  => $_POST['poin_gejala'][$key]
                );
            }

            $test = $this->db->insert_batch('tmp_hasil', $result); // fungsi  untuk menyimpan multi array ke database

            if ($test) {
                echo "data sukses di input";
                redirect('konsultasi/hasil');
            } else {
                echo "gagal di input";
            }
        }
    }
    function hasil()
    {
        $data = array(
            'title' => 'Halaman Hasil',
            'data_hasil' => $this->M_Master->getHasil(),
            'data_ps' => $this->M_Master->getPS(),
            'data_pg' => $this->M_Master->getPG(),
            'data_gj' => $this->M_Master->getAllGejala()
        );
        $this->template->load('back/front', 'back/hasil', $data);
    }
}
