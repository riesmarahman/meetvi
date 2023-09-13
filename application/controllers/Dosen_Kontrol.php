<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_Kontrol extends CI_Controller {

	private $obj_jadwal;
	private $obj_dosen;

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('url','language'));
		$this->load->model('Master_jadwal');
		$this->load->model('Master_dosen');
		$this->load->model('Pengguna');
		$this->load->model('Dosen');

		if ($this->session->userdata('logged_in') == true){
			$this->obj_jadwal = new Master_jadwal();
			$this->obj_dosen = new Master_dosen();
			$this->obj_pengguna = new Pengguna();

		} else {
			redirect('Auth/load_login');
		}
	}

	public function index()
	{
		$dt = $this->session->userdata['info']['id_dosen'];
		$data['dt_jadwal'] = $this->obj_jadwal->get_jadwal($dt);
		$this->load->view('Peserta/Daftar_Jadwal', $data);

	}

	public function Tambah_jadwal()
	{	
		$this->form_validation->set_rules('input_keterangan','Keterangan :','required');

		if($this->form_validation->run() ==  FALSE){
			$this->load->view('Peserta/tambah_jadwal');
		} else {
			$jadwal = new Jadwal();
			$dsn = $this->session->userdata['info']['id_dosen'];
			$jadwal->set_dosen($dsn);
			$jadwal->set_tgl(set_value('input_tgl'));
			$jadwal->set_keterangan(set_value('input_keterangan'));
			$this->obj_jadwal->insert($jadwal);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Jadwal berhasil ditambahkan.</div>');
			redirect('Dosen_Kontrol');
		}

	}

	public function Tambah_dosen(){
		$this->form_validation->set_rules('input_nama','Nama :','required');

		if($this->form_validation->run() ==  FALSE){
			$data ['jabatan'] = $this->obj_dosen->get_jabatan();
			$data ['prodi'] = $this->obj_dosen->get_prodi();
			$this->load->view('Admin/tambah_dosen',$data);
		} else {
			$Dosen = new Dosen();
			$Dosen->set_nama(set_value('input_nama'));
			$Dosen->set_nik(set_value('input_nik'));
			$Dosen->set_nip(set_value('input_nip'));
			$Dosen->set_jabatan(set_value('input_jabatan'));
			$Dosen->set_prodi(set_value('input_prodi'));
			$this->obj_dosen->insert_dosen($Dosen);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Dosen berhasil ditambahkan.</div>');
			redirect('Dosen_Kontrol/Daftar_dosen');
		}
	}

	public function Daftar_dosen(){
		$data ['dosen'] = $this->obj_dosen->get_daftar_dosen();
		$this->load->view('Admin/Daftar_dosen', $data);
	}

	public function hapus_jadwal(){
		$id = $this->uri->segment(3);
		$this->obj_jadwal->delete($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Jadwal berhasil dihapus.</div>');
		redirect ('Dosen_Kontrol');

	}

	public function edit_data(){
		$id = $this->uri->segment(3);
		$result = $this->obj_jadwal->get_jadwal_id($id);
		if ($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id' => $i['id'],
				'tanggal' => $i['tanggal'],
				'keterangan' =>$i['keterangan']
			);
			$this->load->view('Peserta/Ubah_jadwal', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function Ubah_jadwal(){
		$id = $this->input->post('id');
		$tanggal = $this->input->post('input_tgl');
		$keterangan = $this->input->post('input_keterangan');
		$this->Master_jadwal->update($id, $tanggal, $keterangan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Jadwal berhasil diubah.</div>');
		redirect('Dosen_Kontrol');
	}

	public function edit_data_dosen(){
		$id = $this->uri->segment(3);
		$result = $this->obj_dosen->get_id_dosen($id);
		$p = $this->password_generate(7);
		if ($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id' => $i['id'],
				'nama' => $i['nama'],
				'nip' => $i['nip'],
				'nik' => $i['nik'],
				'jabatan' => $i['jabatan'],
				'prodi' => $i['Prodi'],
				'password' => $p
			);

			$this->load->view('Admin/Tambah_akun', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function tambah_akun(){
		$this->form_validation->set_rules('input_nama','Nama :','required');
		$a = new Pengguna();
		$a->set_username(set_value('input_username'));
		$a->set_password(set_value('input_password'));
		$a->set_peran(set_value('input_peran'));
		$a->set_id_dosen(set_value('input_id_dosen'));
		$this->obj_pengguna->insert($a);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Data akun berhasil ditambahkan.</div>');
		redirect('Auth/Daftar_akun');
	}

	function password_generate($chars) {
		$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($data), 0, $chars);
	}

	public function profil (){
		$userdata = $this->session->userdata['logged_in'];	
		if (is_pimpinan($userdata)){
			$dt = $this->session->userdata['info']['id_dosen'];
			$data['profil'] = $this->obj_dosen->get_profil($dt);
			$data['akun'] = $this->obj_dosen->get_akun($dt);
			$this->load->view('Pimpinan/Profil', $data);
		} elseif (is_sekretaris($userdata)){
			$this->load->view('Sekretaris/profil');
		} elseif (is_peserta($userdata)){
			$this->load->view('Peserta/profil');
		} elseif (is_notulis($userdata)){
			$this->load->view('Admin/profil');
		} 
	}

	public function edit_data_profil(){
		$id = $this->uri->segment(3);
		$result = $this->obj_dosen->get_id_akun($id);
		if ($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id' => $i['id'],
				'username' => $i['username'],
				'password' =>$i['password']
			);

		$userdata = $this->session->userdata['logged_in'];

		if (is_pimpinan($userdata)){
			$this->load->view('Pimpinan/Home', $data);
		} elseif (is_sekretaris($userdata)){
			$this->load->view('Sekretaris/Home', $data);
		} elseif (is_peserta($userdata)){
			$this->load->view('Peserta/Home', $data);
		} elseif (is_notulis($userdata)){
			$this->load->view('Admin/Home', $data);
		}

		} else {
			echo "Data was not found";
		}
	}

	public function ubah_profil(){
		$id = $this->input->post('input_id');
		$un = $this->input->post('input_username');
		$pw = $this->input->post('input_password');
		$this->Master_dosen->update_profil($id, $un, $pw);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Jadwal berhasil diubah.</div>');
		redirect('Dosen_Kontrol/profil');
	}
}