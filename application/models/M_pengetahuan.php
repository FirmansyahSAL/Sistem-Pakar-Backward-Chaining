<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengetahuan extends CI_Model
{
    function getPertanyaan($kdPenyakit)
    {
        $query = 'SELECT* FROM pengetahuan JOIN gejala ON pengetahuan.kd_gejala = gejala.kd_gejala WHERE pengetahuan.kd_penyakit="'. $kdPenyakit.'"';
        return $this->db->query($query)->result();
    }

    function getPengetahuanById($id)
    {
        $this->db->select('*');
        $this->db->from('pengetahuan as pg');
        $this->db->from('gejala as gj');
        $this->db->where('pg.kd_gejala = gj.kd_gejala');
        $this->db->where('pg.kd_pengetahuan', '' . $id . '');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $out = $query->result();
            return $out;
        } else {
            return null;
        }
    }


    function getPengetahuanByIdPenyakit($idPenyakit)
    {

        $query = 'SELECT * FROM pengetahuan JOIN gejala ON pengetahuan.kd_gejala = gejala.kd_gejala WHERE pengetahuan.kd_penyakit="'. $idPenyakit.'"';
        return json_decode(json_encode($this->db->query($query)->result()));
    }
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

    function insertPengetahuan($data)
    {
        $query = $this->db->insert('pengetahuan', $data);
        return $query;
    }

    function updatePengetahuan($data, $id)
    {
        $this->db->where('kd_pengetahuan', $id);
        $this->db->update('pengetahuan', $data);
    }

    function getDPengetahuanById($id)
    {
        $param = array('kd_pengetahuan' => $id);
        return $this->db->get_where('pengetahuan', $param);
    }

    function delete($id)
    {
        $this->db->where('kd_pengetahuan', $id);
        $delete = $this->db->delete('pengetahuan');
        return $delete;
    }
}
