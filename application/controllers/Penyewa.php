<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('role') != 'Penyewa') {
			redirect('auth/cek_session');
		}
		$this->load->model('M_penyewa');
	}
	
	function index(){
		echo "Penyewa";
	}
}
