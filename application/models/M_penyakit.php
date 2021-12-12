<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyakit extends CI_Model
{
    function getPenyakit()
    {
        return $this->db->get('penyakit')->result();
    }

    function getAllPenyakit()
    {
        return $this->db->query("select * from penyakit")->result();
    }

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

    function insertPenyakit($data)
    {
        $query = $this->db->insert('penyakit', $data);
        return $query;
    }

    function updatePenyakit($data, $id)
    {
        $this->db->where('kd_penyakit', $id);
        $this->db->update('penyakit', $data);
    }

    function getPenyakitById($id)
    {
        $param = array('kd_penyakit' => $id);
        return $this->db->get_where('penyakit', $param);
    }

    function deletePenyakit($id)
    {
        $this->db->where('kd_penyakit', $id);
        $delete = $this->db->delete('penyakit');
        return $delete;
    }
}
