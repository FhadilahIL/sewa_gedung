<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyewa extends CI_Model
{
    function cari_email($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('penyewa');
    }

    function get_data_penyewa()
    {
        return $this->db->get('penyewa');
    }

    function simpan_data_penyewa($data)
    {
        return $this->db->insert('penyewa', $data);
    }

    function update_data_penyewa($data, $id_penyewa)
    {
        $this->db->where('id_penyewa', $id_penyewa);
        return $this->db->update('penyewa', $data);
    }
}
