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

	function my_profile()
	{
		$data['judul'] = "My Profile";
		$data['selected'] = ['', '', '', '', '', ''];
		$data['active'] = ['', '', '', '', '', ''];
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'))->row();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/my_profile');
		$this->load->view('templates/footer');
	}

	function update_my()
	{
		$id_user = $this->input->post('id_user', TRUE);
		$password = $this->input->post('password', TRUE);
		if ($password == '') {
			$data = [
				'nama'			=> $this->input->post('nama', TRUE),
				'email'			=> $this->input->post('email', TRUE),
			];
		} else {
			$data = [
				'nama'			=> $this->input->post('nama', TRUE),
				'email'			=> $this->input->post('email', TRUE),
				'password'		=> $password,
			];
		}
		if ($this->M_admin->update_data_my($data, $id_user)) {
			$this->session->set_flashdata('berhasil', "Data Profile Berhasil Diubah");
			redirect('admin/my_profile');
		} else {
			$this->session->set_flashdata('gagal', "Data Profile Gagal Diubah");
			redirect('admin/my_profile');
		}
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
		$data['data_gedung'] = $this->M_gedung->get_data_gedung()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_fasilitas');
		$this->load->view('templates/footer');
	}

	function tambah_admin()
	{
		$username = $this->input->post('username', TRUE);
		$data = [
			'id_user'	=> '',
			'nama'		=> $this->input->post('nama', TRUE),
			'email'		=> $this->input->post('email', TRUE),
			'username'	=> $username,
			'password'	=> $this->input->post('password', TRUE),
			'no_tlp'	=> $this->input->post('no_telp', TRUE)
		];
		if ($this->M_penyewa->cari_username($username)->num_rows() > 0) {
			$this->session->set_flashdata('gagal', "Username Telah Digunakan");
			redirect('admin/data_admin');
		} else {
			if ($this->M_admin->simpan_data_admin($data)) {
				$this->session->set_flashdata('berhasil', "Data Admin Berhasil Ditambahkan");
				redirect('admin/data_admin');
			} else {
				$this->session->set_flashdata('gagal', "Data Admin Gagal Ditambahkan");
				redirect('admin/data_admin');
			}
		}
	}

	function tambah_penyewa()
	{
		$email = $this->input->post('email', TRUE);
		$data = [
			'id_penyewa'	=> '',
			'nama_penyewa'	=> $this->input->post('nama', TRUE),
			'email'			=> $email,
			'password'		=> $this->input->post('password', TRUE),
			'jenis_kelamin'	=> $this->input->post('jenis_kelamin', TRUE),
			'alamat'		=> $this->input->post('alamat', TRUE),
			'no_tlp'		=> $this->input->post('no_telp', TRUE),
		];
		if ($this->M_penyewa->cari_email($email)->num_rows() > 0) {
			$this->session->set_flashdata('gagal', "Email Telah Digunakan");
			redirect('admin/data_penyewa');
		} else {
			if ($this->M_penyewa->simpan_data_penyewa($data)) {
				$this->session->set_flashdata('berhasil', "Data Penyewa Berhasil Ditambahkan");
				redirect('admin/data_penyewa');
			} else {
				$this->session->set_flashdata('gagal', "Data Penyewa Gagal Ditambahkan");
				redirect('admin/data_penyewa');
			}
		}
	}

	function tambah_gedung()
	{
		if ($_FILES['gambar_gedung']['name']) {
			$data = [
				'id_gedung'			=> '',
				'nama_gedung'		=> $this->input->post('nama', TRUE),
				'harga_gedung'		=> $this->input->post('harga', TRUE),
				'deskripsi_gedung'	=> $this->input->post('deskripsi', TRUE),
				'gambar_gedung'		=> $this->upload_gambar_gedung($this->input->post('gambar_gedung', TRUE))
			];
		} else {
			$data = [
				'id_gedung'			=> '',
				'nama_gedung'		=> $this->input->post('nama', TRUE),
				'harga_gedung'		=> $this->input->post('harga', TRUE),
				'deskripsi_gedung'	=> $this->input->post('deskripsi', TRUE),
				'gambar_gedung'		=> 'gedung_default.svg'
			];
		}
		if ($this->M_gedung->simpan_data_gedung($data)) {
			$this->session->set_flashdata('berhasil', "Data Gedung Berhasil Ditambahkan");
			redirect('admin/data_gedung');
		} else {
			$this->session->set_flashdata('gagal', "Data Gedung Gagal Ditambahkan");
			redirect('admin/data_gedung');
		}
	}

	function update_gedung()
	{
		$id_gedung = $this->input->post('id_gedung', TRUE);
		$data_gedung = $this->M_gedung->cari_data_gedung($id_gedung)->row();
		$nama_gambar = $data_gedung->gambar_gedung;
		if ($_FILES['gambar_gedung']['name']) {
			$data = [
				'nama_gedung'		=> $this->input->post('nama', TRUE),
				'harga_gedung'		=> $this->input->post('harga', TRUE),
				'deskripsi_gedung'	=> $this->input->post('deskripsi', TRUE),
				'gambar_gedung'		=> $this->upload_gambar_gedung($this->input->post('gambar_gedung', TRUE))
			];
			if ($nama_gambar != 'gedung_default.svg') {
				$this->hapus_foto_gedung($nama_gambar);
			}
		} else {
			$data = [
				'nama_gedung'		=> $this->input->post('nama', TRUE),
				'harga_gedung'		=> $this->input->post('harga', TRUE),
				'deskripsi_gedung'	=> $this->input->post('deskripsi', TRUE),
			];
		}
		if ($this->M_gedung->update_data_gedung($data, $id_gedung)) {
			$this->session->set_flashdata('berhasil', "Data Gedung Berhasil Diubah");
			redirect('admin/data_gedung');
		} else {
			$this->session->set_flashdata('gagal', "Data Gedung Gagal Diubah");
			redirect('admin/data_gedung');
		}
	}
	function tambah_fasilitas()
	{
		if ($_FILES['gambar_fasilitas']['name']) {
			$data = [
				'id_fasilitas'		=> '',
				'nama_fasilitas'	=> $this->input->post('nama_fasilitas', TRUE),
				'id_gedung'			=> $this->input->post('id_gedung', TRUE),
				'gambar_fasilitas'	=> $this->upload_gambar_fasilitas($this->input->post('gambar_fasilitas', TRUE))
			];
			print_r('if kondisi');
			// die;
		} else {
			$data = [
				'id_fasilitas'		=> '',
				'nama_fasilitas'	=> $this->input->post('nama_fasilitas', TRUE),
				'id_gedung'			=> $this->input->post('id_gedung', TRUE),
				'gambar_fasilitas'	=> 'fasilitas_default.svg'
			];
			print_r('else kondisi');
			// die;
		}
		if ($this->M_gedung->simpan_data_fasilitas($data)) {
			$this->session->set_flashdata('berhasil', "Data Fasilitas Berhasil Ditambahkan");
			redirect('admin/data_fasilitas');
		} else {
			$this->session->set_flashdata('gagal', "Data Fasilitas Gagal Ditambahkan");
			redirect('admin/data_fasilitas');
		}
	}

	function update_fasilitas()
	{
		$id_fasilitas = $this->input->post('id_fasilitas', TRUE);
		$data_fasilitas = $this->M_gedung->cari_data_fasilitas($id_fasilitas)->row();
		$nama_gambar = $data_fasilitas->gambar_fasilitas;
		if ($_FILES['gambar_fasilitas']['name']) {
			$data = [
				'nama_fasilitas'	=> $this->input->post('nama_fasilitas', TRUE),
				'id_gedung'			=> $this->input->post('id_gedung', TRUE),
				'gambar_fasilitas'	=> $this->upload_gambar_fasilitas($this->input->post('gambar_fasilitas', TRUE))
			];
			if ($nama_gambar != 'fasilitas_default.svg') {
				$this->hapus_foto_fasilitas($nama_gambar);
			}
		} else {
			$data = [
				'nama_fasilitas'	=> $this->input->post('nama_fasilitas', TRUE),
				'id_gedung'			=> $this->input->post('id_gedung', TRUE),
			];
		}
		if ($this->M_gedung->update_data_fasilitas($data, $id_fasilitas)) {
			$this->session->set_flashdata('berhasil', "Data Fasilitas Berhasil Diubah");
			redirect('admin/data_fasilitas');
		} else {
			$this->session->set_flashdata('gagal', "Data Fasilitas Gagal Diubah");
			redirect('admin/data_fasilitas');
		}
	}

	function edit_penyewa()
	{
		$id_penyewa = $this->input->post('id_penyewa', TRUE);
		$password = $this->input->post('password', TRUE);
		if ($password == '') {
			$data = [
				'nama_penyewa'	=> $this->input->post('nama', TRUE),
				'email'			=> $this->input->post('email', TRUE),
				'jenis_kelamin'	=> $this->input->post('jenis_kelamin', TRUE),
				'alamat'		=> $this->input->post('alamat', TRUE),
				'no_tlp'		=> $this->input->post('no_telp', TRUE),
			];
		} else {
			$data = [
				'nama_penyewa'	=> $this->input->post('nama', TRUE),
				'email'			=> $this->input->post('email', TRUE),
				'password'		=> $password,
				'jenis_kelamin'	=> $this->input->post('jenis_kelamin', TRUE),
				'alamat'		=> $this->input->post('alamat', TRUE),
				'no_tlp'		=> $this->input->post('no_telp', TRUE),
			];
		}
		if ($this->M_penyewa->update_data_penyewa($data, $id_penyewa)) {
			$this->session->set_flashdata('berhasil', "Data Penyewa Berhasil Diubah");
			redirect('admin/data_penyewa');
		} else {
			$this->session->set_flashdata('gagal', "Data Penyewa Gagal Diubah");
			redirect('admin/data_penyewa');
		}
	}

	function hapus_gedung($id_gedung)
	{
		$id_gedung = $this->uri->segment(3);
		$data_gedung = $this->M_gedung->cari_data_gedung($id_gedung)->row();
		$nama_gambar = $data_gedung->gambar_gedung;
		if ($this->M_gedung->hapus_data_gedung($id_gedung)) {
			if ($nama_gambar != 'gedung_default.svg') {
				$this->hapus_foto_gedung($nama_gambar);
			}
			$this->session->set_flashdata('berhasil', "Data Gedung Behasil Dihapus");
			redirect('admin/data_gedung');
		} else {
			$this->session->set_flashdata('gagal', "Data Gedung Gagal Dihapus");
			redirect('admin/data_gedung');
		}
	}

	function hapus_fasilitas($id_fasilitas)
	{
		$id_fasilitas = $this->uri->segment(3);
		$data_fasilitas = $this->M_gedung->cari_data_fasilitas($id_fasilitas)->row();
		$nama_gambar = $data_fasilitas->gambar_fasilitas;
		if ($this->M_gedung->hapus_data_fasilitas($id_fasilitas)) {
			if ($nama_gambar != 'fasilitas_default.svg') {
				$this->hapus_foto_fasilitas($nama_gambar);
			}
			$this->session->set_flashdata('berhasil', "Data Fasilitas Behasil Dihapus");
			redirect('admin/data_fasilitas');
		} else {
			$this->session->set_flashdata('gagal', "Data Fasilitas Gagal Dihapus");
			redirect('admin/data_fasilitas');
		}
	}

	function upload_gambar_gedung($nama_gedung)
	{
		$this->load->library('upload');
		$this->upload->initialize([
			'upload_path'   => './assets/img/gedung/',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size'      => '2150',
			'encrypt_name'  => TRUE,
			'overwrite'     => TRUE,
			'file_name'     => $nama_gedung
		]);

		if ($this->upload->do_upload('gambar_gedung')) {
			$gambar_gedung = $this->upload->data();
			$this->load->library('image_lib');
			$this->image_lib->initialize([
				'image_library' => 'gd2',
				'source_image' => './assets/img/gedung/' . $gambar_gedung['file_name'],
				'maintain_ratio' => FALSE,
				'create_thumb' => FALSE,
			]);
			return $this->upload->data('file_name');
		} else {
			return $this->upload->display_errors('<p>', '</p>');
		}
	}

	function hapus_foto_gedung($nama_gambar)
	{
		unlink('assets/img/gedung/' . $nama_gambar);
	}

	function upload_gambar_fasilitas($nama_fasilitas)
	{
		$this->load->library('upload');
		$this->upload->initialize([
			'upload_path'   => './assets/img/fasilitas/',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size'      => '2150',
			'encrypt_name'  => TRUE,
			'overwrite'     => TRUE,
			'file_name'     => $nama_fasilitas
		]);

		if ($this->upload->do_upload('gambar_fasilitas')) {
			$gambar_fasilitas = $this->upload->data();
			$this->load->library('image_lib');
			$this->image_lib->initialize([
				'image_library' => 'gd2',
				'source_image' => './assets/img/fasilitas/' . $gambar_fasilitas['file_name'],
				'maintain_ratio' => FALSE,
				'create_thumb' => FALSE,
			]);
			return $this->upload->data('file_name');
		} else {
			return $this->upload->display_errors('<p>', '</p>');
		}
	}

	function hapus_foto_fasilitas($nama_gambar)
	{
		unlink('assets/img/fasilitas/' . $nama_gambar);
	}
}
