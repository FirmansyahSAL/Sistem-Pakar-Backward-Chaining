<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konsultasi extends CI_Model
{
    function insert($data)
    {
        return $this->db->insert('konsultasi', $data) ? $this->db->insert_id() : false;
    }

    function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('konsultasi', $data);
    }

    function getById($id)
    {
        $param = array('id' => $id);
        return $this->db->get_where('konsultasi', $param);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('konsultasi');
    }
    
    function history($userid)
    {
        return $this->db->query("SELECT * FROM konsultasi INNER JOIN penyakit ON konsultasi.kd_penyakit=penyakit.kd_penyakit WHERE id_user=" . $userid . " LIMIT 3")->result();
    }

    function clear_data()
    {
        return $this->db->query('DELETE FROM konsultasi WHERE id_user IS NULL');
    }
}
