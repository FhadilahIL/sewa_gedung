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

    function cari_data_gedung($id_gedung)
    {
        $this->db->where('id_gedung', $id_gedung);
        return $this->db->get('gedung');
    }

    function hapus_data_gedung($id_gedung)
    {
        $this->db->where('id_gedung', $id_gedung);
        return $this->db->delete('gedung');
    }

    function hapus_data_fasilitas($id_fasilitas)
    {
        $this->db->where('id_fasilitas', $id_fasilitas);
        return $this->db->delete('fasilitas');
    }

    function cari_data_fasilitas($id_fasilitas)
    {
        $this->db->where('id_fasilitas', $id_fasilitas);
        return $this->db->get('fasilitas');
    }

    function simpan_data_gedung($data)
    {
        return $this->db->insert('gedung', $data);
    }

    function update_data_gedung($data, $id_gedung)
    {
        $this->db->where('id_gedung', $id_gedung);
        return $this->db->update('gedung', $data);
    }

    function simpan_data_fasilitas($data)
    {
        return $this->db->insert('fasilitas', $data);
    }

    function update_data_fasilitas($data, $id_fasiltas)
    {
        $this->db->where('id_fasilitas', $id_fasiltas);
        return $this->db->update('fasilitas', $data);
    }
}
