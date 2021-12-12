<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gejala extends CI_Model
{
    function getAll()
    {
        return $this->db->get("gejala")->result();
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

    function insertGejala($data)
    {
        $query = $this->db->insert('gejala', $data);
        return $query;
    }

    function updateGejala($data, $id)
    {
        $this->db->where('kd_gejala', $id);
        $this->db->update('gejala', $data);
    }

    function getGejalaById($id)
    {
        $param = array('kd_gejala' => $id);
        return $this->db->get_where('gejala', $param);
    }

    function deleteGejala($id)
    {
        $this->db->where('kd_gejala', $id);
        $delete = $this->db->delete('gejala');
        return $delete;
    }
}
