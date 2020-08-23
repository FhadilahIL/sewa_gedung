<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gedung extends CI_Model
{
    function get_data_gedung()
    {
        return $this->db->query('select * from gedung');
    }

    function get_data_fasilitas()
    {
        return $this->db->query('select * from fasilitas inner join gedung on fasilitas.id_gedung = gedung.id_gedung');
    }

    function data_fasilitas_gedung($id_gedung)
    {
        $this->db->where('id_gedung', $id_gedung);
        return $this->db->get('fasilitas');
    }
}
