<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Master extends CI_Model

{
    //  GET DATA
    function getAllPenyakit()
    {
        return $this->db->query("select * from penyakit")->result();
    }
    function getAllGejala()
    {
        return $this->db->query("select * from gejala")->result();
    }
    function jumlah_gejala()
    {
        $this->db->select('*');
        $this->db->from('gejala');
        return $this->db->get()->num_rows();
    }
    function jumlah_penyakit()
    {
        $this->db->select('*');
        $this->db->from('penyakit');
        return $this->db->get()->num_rows();
    }
    function jumlah_pengetahuan()
    {
        $this->db->select('*');
        $this->db->from('pengetahuan');
        return $this->db->get()->num_rows();
    }

    //  GET DATA BY ID
    function getPenyakitById($id)
    {
        $param = array('kd_penyakit' => $id);
        return $this->db->get_where('penyakit', $param);
    }
    function getGejalaById($id)
    {
        $param = array('kd_gejala' => $id);
        return $this->db->get_where('gejala', $param);
    }
    function getDPengetahuanById($id)
    {
        $param = array('kd_pengetahuan' => $id);
        return $this->db->get_where('pengetahuan', $param);
    }
    function getPG()
    {
        return $this->db->query("select g.poin_gejala from tmp_hasil as h, gejala as g where h.kd_gejala=g.kd_gejala and h.poin_gejala='0'")->result();
    }
    function getHasil()
    {
        return $this->db->query("select h.kd_penyakit, h.kd_gejala, h.poin_gejala,h.poin_user, g.nama_gejala from tmp_hasil as h, gejala as g where h.kd_gejala=g.kd_gejala and h.poin_gejala>'0'")->result();
    }
    function getPS()
    {
        return $this->db->query("select * from tmp_hasil as h, penyakit as p, gejala as g where h.kd_penyakit=p.kd_penyakit and h.kd_gejala=g.kd_gejala and h.poin_gejala>'0' limit 1")->result();
    }

    //  KODE PENYAKIT
    function getKodePenyakit()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_penyakit,3)) as kd_max from penyakit");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "P" . $kd;
    }
    //  KODE GEJALA	
    function getKodeGejala()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_gejala,3)) as kd_max from gejala");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "G" . $kd;
    }
    //  KODE PENGETAHUAN	
    function getKodePengetahuan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_pengetahuan,3)) as kd_max from pengetahuan");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "PG" . $kd;
    }
    function getPenyakit()
    {
        if (isset($_GET['kd_penyakit'])) {
            $penyakit = $_GET['kd_penyakit'];
            $kd = $this->db->query("select * from pengetahuan where kd_penyakit='" . $penyakit . "'")->row_array();
            $insert = "INSERT INTO tmp_relasi (kd_penyakit, kd_gejala) SELECT kd_penyakit, kd_gejala FROM pengetahuan WHERE kd_penyakit='" . $kd['kd_penyakit'] . "'";
            $this->db->query($insert);
        } else {
            $penyakit = 'null';
        }
        $this->db->select('*');
        $this->db->from('pengetahuan');
        $this->db->where('kd_penyakit = ', '' . $penyakit . '');
        $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $out = $query->result();
            return $out;
        } else {
            return array();
        }
    }
    function getRelasi()
    {
        return $this->db->query("select * from tmp_relasi as r, gejala as g where r.kd_gejala=g.kd_gejala")->result();
    }
    function getPengetahuanById($id)
    {
        if (isset($_GET['kd_penyakit'])) {
            $kd_penyakit = $_GET['kd_penyakit'];
        } else {
        }
        $this->db->select('*');
        $this->db->from('pengetahuan as pg');
        $this->db->from('gejala as gj');
        $this->db->where('kd_penyakit', '' . $kd_penyakit . '');
        $this->db->where('pg.kd_gejala = gj.kd_gejala');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $out = $query->result();
            return $out;
        } else {
            return array();
        }
    }
    function getPertanyaanById($id)
    {
        if (isset($_GET['kd_penyakit'])) {
            $kd_penyakit = $_GET['kd_penyakit'];
        } else {
        }
        $this->db->select('*');
        $this->db->from('pengetahuan');
        $this->db->where('kd_penyakit', '' . $kd_penyakit . '');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $out = $query->result();
            return $out;
        } else {
            return array();
        }
    }

    //  INSERT DATA
    function insertPenyakit($data)
    {
        $query = $this->db->insert('penyakit', $data);
        return $query;
    }
    function insertGejala($data)
    {
        $query = $this->db->insert('gejala', $data);
        return $query;
    }
    function insertPengetahuan($data)
    {
        $query = $this->db->insert('pengetahuan', $data);
        return $query;
    }
    function simpanRelasi()
    {
        $kdpenyakit         = $this->input->post('kd_penyakit');
        $penyakit           = $this->db->get_where('pengetahuan', array('kd_penyakit' => $kdpenyakit))->row_array();
        $data           = array(
            'kd_penyakit' => $kdpenyakit,
            'kd_gejala' => $penyakit['kd_gejala']
        );
        $this->db->insert('tmp_relasi', $data);
    }

    //  UPDATE DATA
    function updatePenyakit($data, $id)
    {
        $this->db->where('kd_penyakit', $id);
        $this->db->update('penyakit', $data);
    }
    function updateGejala($data, $id)
    {
        $this->db->where('kd_gejala', $id);
        $this->db->update('gejala', $data);
    }
    function updatePengetahuan($data, $id)
    {
        $this->db->where('kd_pengetahuan', $id);
        $this->db->update('pengetahuan', $data);
    }
    //  DELETE DATA
    function deletePenyakit($id)
    {
        $this->db->where('kd_penyakit', $id);
        $delete = $this->db->delete('penyakit');
        return $delete;
    }
    function deleteGejala($id)
    {
        $this->db->where('kd_gejala', $id);
        $delete = $this->db->delete('gejala');
        return $delete;
    }
}
