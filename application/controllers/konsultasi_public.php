<?php
class Konsultasi_public extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_diagnosa');
        $this->load->model('M_gejala');
        $this->load->model('M_penyakit');
        $this->load->model('M_pengetahuan');
        $this->load->model('M_konsultasi');
    }

    function index()
    {
        $data = array(
            'title' => 'Halaman Home',
            'data_penyakit' => $this->M_penyakit->getPenyakit(),
        );
        $this->db->empty_table('tmp_relasi');
        $this->db->empty_table('tmp_hasil');
        $this->template->load('back/front', 'back/konsultasi/index', $data);
    }

    function pertanyaan()
    {
        $kdPenyakit = urlencode($this->input->get('kd_penyakit', true));
        $data = array(
            'title' => 'Halaman Pertanyaan',
            "pertanyaan" => $this->M_pengetahuan->getPertanyaan($kdPenyakit),
            "kd_penyakit" => $kdPenyakit,
        );
        $this->template->load('back/front', 'back/konsultasi/pertanyaan', $data);
    }

    function tambahhasil()
    {
        $this->M_konsultasi->clear_data();
        $this->form_validation->set_rules('kd_gejala[]', 'kd_gejala', 'required|trim|xss_clean');
        $this->form_validation->set_rules('poin_gejala[]', 'poin_gejala', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kd_penyakit', 'kd_penyakit', 'required|trim|xss_clean');

        $kd_penyakit = $this->input->post('kd_penyakit');
        $konsultasi_id = $this->M_konsultasi->insert(array(
            'kd_penyakit' => $kd_penyakit,
            'id_user' => NULL
        ));

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors(); // tampilkan apabila ada error
        } else {

            $nm = $this->input->post('poin_gejala');
            $result = array();

            foreach ($nm as $key => $val) {
                if ($val != 0) {
                    $result[] = array(
                        "id" => "DEFAULT",
                        "kd_gejala"  => $_POST['kd_gejala'][$key],
                        "poin_gejala"  => $_POST['poin_gejala'][$key],
                        "konsultasi_id" => $konsultasi_id,
                    );
                }
            }

            if (count($result) == 0) {
                redirect('konsultasi_public/hasil/' . $konsultasi_id);
            }

            $test = $this->M_diagnosa->addMany($result); // fungsi  untuk menyimpan multi array ke database

            if ($test) {
                echo "data sukses di input";
                redirect('konsultasi_public/hasil/' . $konsultasi_id);
            } else {
                echo "gagal di input";
            }
        }
    }

    function hasil($konsultasi_id)
    {
        $data = array(
            'title' => 'Halaman Hasil',
            'data_hasil' => $this->M_diagnosa->getHasilPublic($konsultasi_id),
            'data_ps' => $this->M_diagnosa->getPS($konsultasi_id),
            'data_pg' => $this->M_diagnosa->getPG($konsultasi_id),
            'data_gj' => $this->M_gejala->getAll()
        );
        $this->template->load('back/front', 'back/konsultasi/hasil', $data);
    }
}
