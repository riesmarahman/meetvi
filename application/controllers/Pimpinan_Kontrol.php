<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan_kontrol extends CI_Controller {

	private $obj_dosen;
	private $obj_rapat;
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('URL');
		$this->load->model('Master_rapat');
		$this->load->model('Master_jadwal');

		if ($this->session->userdata('logged_in') == true){
			$this->obj_dosen = new Master_jadwal();
			$this->obj_rapat = new Master_rapat();

		} else {
			redirect('Auth/load_login');
		}
	}

	public function lihat_hasil_rapat()
	{
		$data['hasil'] = $this->obj_rapat->get_hasil_rapat();
		$this->load->view('Pimpinan/Daftar_Hasil_Rapat', $data);
	}

	public function lihat_jadwal_dosen()
	{
		if (isset($_POST['input_tgl'])) {
			$tgl = $_POST['input_tgl'];
			$prodi = $_POST['input_prodi'];
			$data['jadwal_dosen'] = $this->obj_dosen->get_jadwal_semua($tgl, $prodi);
			$this->load->view('Pimpinan/Lihat_jadwal', $data);
		} else {
			$tgl = 0;
			$prodi = 0;
			$data['jadwal_dosen'] = $this->obj_dosen->get_jadwal_semua($tgl, $prodi);
			$this->load->view('Pimpinan/Lihat_jadwal', $data);
		}
	}
}