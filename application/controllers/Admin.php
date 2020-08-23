<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != 'Admin') {
			redirect('auth/cek_session');
		}
		$this->load->model('M_admin');
		$this->load->model('M_penyewa');
		$this->load->model('M_gedung');
	}

	function index()
	{
		$data['judul'] = "Dashboard";
		$data['selected'] = ['selected', '', '', '', '', ''];
		$data['active'] = ['active', '', '', '', '', ''];
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'))->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/index');
		$this->load->view('templates/footer');
	}

	function data_admin()
	{
		$data['judul'] = "Data Admin";
		$data['selected'] = ['', 'selected', '', '', '', ''];
		$data['active'] = ['', 'active', '', '', '', ''];
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'))->row();
		$data['admin'] = $this->M_admin->get_data_admin()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_admin');
		$this->load->view('templates/footer');
	}

	function data_penyewa()
	{
		$data['judul'] = "Data Penyewa";
		$data['selected'] = ['', '', 'selected', '', '', ''];
		$data['active'] = ['', '', 'active', '', '', ''];
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'))->row();
		$data['penyewa'] = $this->M_penyewa->get_data_penyewa()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_penyewa');
		$this->load->view('templates/footer');
	}

	function data_gedung()
	{
		$data['judul'] = "Data Gedung";
		$data['selected'] = ['', '', '', 'selected', '', ''];
		$data['active'] = ['', '', '', 'active', '', ''];
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'))->row();
		$data['gedung'] = $this->M_gedung->get_data_gedung()->result();
		$data['fasilitas'] = $this->M_gedung->get_data_fasilitas()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_gedung');
		$this->load->view('templates/footer');
	}

	function data_fasilitas()
	{
		$data['judul'] = "Data Fasilitas";
		$data['selected'] = ['', '', '', '', 'selected', ''];
		$data['active'] = ['', '', '', '', 'active', ''];
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'))->row();
		$data['fasilitas'] = $this->M_gedung->get_data_fasilitas()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_fasilitas');
		$this->load->view('templates/footer');
	}
}
