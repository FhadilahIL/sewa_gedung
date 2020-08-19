<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyewa extends CI_Model {
    function cari_email($email){
        $this->db->where('email', $email);
        return $this->db->get('penyewa');
    }
}