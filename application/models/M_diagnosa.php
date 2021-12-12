<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_diagnosa extends CI_Model
{
    function addMany($diagnosa)
    {
        return $this->db->insert_batch('diagnosa', $diagnosa);
    }

    function getHasil()
    {
        return $this->db->query("select h.kd_penyakit, h.kd_gejala, h.poin_gejala,h.poin_user, g.nama_gejala from diagnosa as h, gejala as g where h.kd_gejala=g.kd_gejala and h.poin_gejala>'0'")->result();
    }

    function getPS()
    {
        return $this->db->query("select * from diagnosa as h, penyakit as p, gejala as g where h.kd_penyakit=p.kd_penyakit and h.kd_gejala=g.kd_gejala and h.poin_gejala>'0' limit 1")->result();
    }

    function getPG()
    {
        return $this->db->query("select g.poin_gejala from diagnosa as h, gejala as g where h.kd_gejala=g.kd_gejala and h.poin_gejala='0'")->result();
    }

    function clear_data()
    {
        return $this->db->empty_table('diagnosa');
    }
}
