<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function cari_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user');
    }

    function data_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('user');
    }

    function get_data_admin()
    {
        return $this->db->get('user');
    }

    function simpan_data_admin($data)
    {
        return $this->db->insert('user', $data);
    }

    function update_data_my($data, $id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data);
    }
}
