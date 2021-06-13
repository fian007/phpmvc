<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index($nama = 'Pak faruk')
	{
		$data['judul'] = 'Halaman Home';
		$data['nama'] = $nama;
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
	}

	public function about($nama = 'Mikasa Ackerman')
	{
		$data['judul'] = 'Halaman About';
		$data['nama'] = $nama;
		$this->load->view('templates/header', $data);
		$this->load->view('about/about', $data);
		$this->load->view('templates/footer');
	}

	public function daftar()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['data_mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
		if ($this->input->post('keyword')) {
			$data['data_mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/daftar', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data()
	{
		$data['judul'] = 'Tambah Data';
		$this->load->view('templates/header', $data);
		$this->load->view('tambah/tambah_data');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nrp', 'Nrp', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Tambah Data';
			$this->load->view('templates/header', $data);
			$this->load->view('tambah/tambah_data');
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa_model->tambah_data();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('welcome/daftar');
		}
	}

	public function detail()
	{
		$id = $this->uri->segment(3);
		$data['judul'] = 'Detail Data';
		$data['detail'] = $this->Mahasiswa_model->detail_data($id);
		$this->load->view('templates/header', $data);
		$this->load->view('detail/detail', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_data()
	{
		$id = $this->uri->segment(3);
		$where = array('id' => $id);
		$this->Mahasiswa_model->hapus_data($where, 'mahasiswa');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('welcome/daftar');
	}

	public function edit_data()
	{
		$id = $this->uri->segment(3);
		$data['edit_data'] = $this->Mahasiswa_model->edit_data($id);
		$data['judul'] = 'Halaman Edit';
		$this->load->view('templates/header', $data);
		$this->load->view('edit/edit_data', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nrp = $this->input->post('nrp');
		$email = $this->input->post('email');
		$jurusan = $this->input->post('jurusan');

		$data = array(
			'nama' => $nama,
			'nrp' => $nrp,
			'email' => $email,
			'jurusan' => $jurusan
		);
		$where = array('id' => $id);
		$this->Mahasiswa_model->update_data($where, $data, 'mahasiswa');
		redirect('welcome/daftar');
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'User', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$validate = $this->Mahasiswa_model->proses_login($username, $password);
			if ($validate->num_rows() > 0) {
				$data = $validate->result_array()[0];
				$username = $data['username'];
				$password = $data['password'];
				$id = $data['id'];

				$sesdata = array(
					'password' => $password,
					'username' => $username,
					'id' => $id
				);
				$this->session->set_userdata($sesdata);
				redirect('welcome/index',);
			} else {
				redirect('welcome/login');
			}
		}
	}

	public function utama($nama = 'Pak Faruk')
	{
		$data['nama'] = $nama;
		$this->load->view('auth/utama', $data);
	}

	public function registrasi()
	{
		$this->load->view('auth/registrasi');
	}

	public function proses_registrasi()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/registrasi');
		} else {
			$this->Mahasiswa_model->tambah_regis();
			redirect('welcome/login');
		}
	}
}
