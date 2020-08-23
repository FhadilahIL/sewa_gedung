<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_penyewa');
	}

	public function admin()
	{
		if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Penyewa') {
			redirect('auth/cek_session');
		}
		$this->load->view('login/admin');
	}
	
	public function penyewa()
	{
		if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Penyewa') {
			redirect('auth/cek_session');
		}
		$this->load->view('login/penyewa');
	}

	function login_admin(){
		$username = trim($this->input->post('username', TRUE));
		$password = trim($this->input->post('password', TRUE));
		
		$data = $this->M_admin->cari_username($username);
		if ($data->result()) {
			$data_admin = $data->row();
			if ($password === $data_admin->password) {
				$data_user = [
					'role'		=> 'Admin',
					'username'	=> $data_admin->username,
					'id_user'	=> $data_admin->id_user
				];
				$this->session->set_userdata($data_user);
				redirect('auth/cek_session');
			} else {
				$this->session->set_flashdata('gagal','Salah Password');
				redirect('auth/admin');
			}
		} else {
			$this->session->set_flashdata('gagal','Invalid User');
			redirect('auth/admin');
		}
	}
	
	function login_penyewa(){
		$email = trim($this->input->post('email', TRUE));
		$password = trim($this->input->post('password', TRUE));
		
		$data = $this->M_penyewa->cari_email($email);
		if ($data->result()) {
			$data_penyewa = $data->row();
			if ($password === $data_penyewa->password) {
				$data_user = [
					'role'		=> 'Penyewa',
					'email'		=> $data_penyewa->email,
					'id_user'	=> $data_penyewa->id_penyewa
				];
				$this->session->set_userdata($data_user);
				redirect('auth/cek_session');
			} else {
				$this->session->set_flashdata('gagal','Salah Password');
				redirect('auth/penyewa');
			}
		} else {
			$this->session->set_flashdata('gagal','Invalid User');
			redirect('auth/penyewa');
		}
	}

	function cek_session(){
		if ($this->session->userdata('role') == "Admin") {
			redirect('admin');
		} else if ($this->session->userdata('role') == "Penyewa"){
			redirect('penyewa');
		} else {
			redirect('/');
		}
	}

	function logout(){
		$session = ['id_user', 'role', 'username'];
		$this->session->unset_userdata($session);
        redirect('/');
	}
}
