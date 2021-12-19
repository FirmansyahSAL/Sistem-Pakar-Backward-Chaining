<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_diagnosa extends CI_Model
{
    function addMany($diagnosa)
    {
        return $this->db->insert_batch('diagnosa', $diagnosa);
    }

    function getHasil($konsultasi_id, $iduser)
    {
        return $this->db->query("SELECT * FROM konsultasi k JOIN penyakit p ON p.kd_penyakit=k.kd_penyakit JOIN diagnosa d on k.id=d.konsultasi_id JOIN gejala g on g.kd_gejala=d.kd_gejala WHERE k.id=" . $konsultasi_id . " AND d.poin_gejala>'0' AND k.id_user=" . $iduser)->result();
    }

    function getHasilPublic($konsultasi_id)
    {
        return $this->db->query("SELECT * FROM konsultasi k JOIN penyakit p ON p.kd_penyakit=k.kd_penyakit JOIN diagnosa d on k.id=d.konsultasi_id JOIN gejala g on g.kd_gejala=d.kd_gejala WHERE k.id=" . $konsultasi_id . " AND d.poin_gejala>'0' AND k.id_user IS NULL")->result();
    }

    function getPS($konsultasi_id)
    {
        return $this->db->query("SELECT * FROM konsultasi k JOIN penyakit p ON p.kd_penyakit=k.kd_penyakit JOIN diagnosa d on k.id=d.konsultasi_id JOIN gejala g on g.kd_gejala=d.kd_gejala WHERE k.id=" . $konsultasi_id . " AND d.poin_gejala>'0' limit 1")->result();
    }

    function getPG($konsultasi_id)
    {
        return $this->db->query("SELECT * FROM konsultasi k JOIN penyakit p ON p.kd_penyakit=k.kd_penyakit JOIN diagnosa d on k.id=d.konsultasi_id JOIN gejala g on g.kd_gejala=d.kd_gejala WHERE k.id=" . $konsultasi_id . " AND d.poin_gejala='0'")->result();
    }
}
