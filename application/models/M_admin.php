<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    function cari_username($username){
        $this->db->where('username', $username);
        return $this->db->get('user');
    }
}