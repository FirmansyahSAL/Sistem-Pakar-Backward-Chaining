<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_googleapi extends CI_Model
{
    public $id = 'id_googleapi';

    function get_googleapi()
    {
        return $this->db->get('googleapi')->result();
    }

    function get_id_googleapi($id)
    {
        $this->db->where('id_googleapi', $id);
        return $this->db->get('googleapi')->row();
    }

    function insert($data)
    {
        $this->db->insert('googleapi', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id_googleapi', $id);
        $this->db->update('googleapi', $data);
    }

    function delete($id)
    {
        $this->db->where('id_googleapi', $id);
        $this->db->delete('googleapi');
    }
}
