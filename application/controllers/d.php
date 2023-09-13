<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('URL');
		$this->load->model('Pengguna');
	}

	public function index() {
		if ($this->session->userdata('logged_in') == true) {
			redirect('Auth/load_home');
		} else {
			redirect('Auth/load_login');
		}
	}

	public function load_login(){
		$this->load->view('Auth/Login');
	}

	public function load_home(){
		if ($this->session->userdata('logged_in') == true) {
			$this->load->view('Pimpinan/Home');
		} else {
			redirect('Auth/load_login');
		}
	}

	public function login(){
		$login = new Pengguna();

		$login->set_username = $this->form_validation->set_rules('username', 'Username', 'trim|required');
		$login->set_password = $this->form_validation->set_rules('password', 'Password', 'trim|required');

		$hasil = $login->login();

		if (!$hasil) {
			$this->session->set_flashdata('pesan','Maaf, username atau password yang Anda masukkan salah.');
			redirect('Auth/load_login');
		} else {
			$hasili = explode('&',$hasil);
			$peran = $hasili[0];
			$id_dosen = $hasili[1];
			$id_staf = $hasili[2];
			$sess_array = array(
				'peran' => $peran,
				'id_dosen' => $id_dosen,
				'id_staf' =>$id_staf
			);
			$this->session->set_userdata('logged_in', $sess_array);
			$userdata = $this->session->userdata['logged_in'];
			redirect('Auth/load_home');
		}
	}

	/* 

	public function login(){ 
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if (!isset($this->session->userdata['logged_in'])) {
			if ($this->form_validation->run() == FALSE) {
				redirect('Auth/load_login');
			} else {
				$this->login_proses($this->input->post('username'), $this->input->post('password'));
			}
		} else {
			redirect('Auth/load_home');
		}
	}

	private function login_proses($uname,$pass){
		$login = new Pengguna();
		$login->set_username($uname);
		$login->set_password($pass);

		$hasil = $login->login();

		if (!$hasil) {
			$this->session->set_flashdata('auth_notif','Maaf, username atau password yang Anda masukkan salah.');
			redirect('Auth/load_login');
		} else {

			$hasili = explode('&',$hasil);
			$peran = $hasili[0];
			$id_dosen = $hasili[1];
			$id_staf = $hasili[2];

			$sess_array = array(
				'peran' => $peran,
				'id_dosen' => $id_dosen,
				'id_staf' =>$id_staf
			);

			$this->session->set_userdata('logged_in', $sess_array);
			$userdata = $this->session->userdata['logged_in'];
			$this->load_home($userdata);
		}
	}

	public function load_home(){
		$userdata = $this->session->userdata['logged_in'];
		if (is_pimpinan($userdata)){
			$id_dosen = $userdata['id_dosen'];
			$this->load->model("Dosen");
			$obj_dosen = new Dosen($id_dosen);

			$arr = array(
				'nama' => $obj_dosen->get_nama(),
				'nik' => $obj_dosen->get_nik(),	
				'nip' => $obj_dosen->get_nip()
			);
			$this->session->set_userdata('info', $arr);
			$this->load->view('Pimpinan/Home',$arr);

		} elseif (is_sekertaris($userdata)){
			$id_staf = $userdata['id_staf'];
			$this->load->model("Staf");
			$obj_dosen = new Staf($id_staf);

			$arr = array(
				'nama' => $obj_dosen->get_nama(),
				'email' => $obj_dosen->get_email()
			);
			$this->session->set_userdata('info', $arr);
			$this->load->view('Sekertaris/Home');

		} elseif (is_peserta($userdata)){
			$id_dosen = $userdata['id_dosen'];
			$this->load->model("Dosen");
			$obj_dosen = new Dosen($id_dosen);

			$arr = array(
				'nama' => $obj_dosen->get_nama(),
				'nik' => $obj_dosen->get_nik(),	
				'nip' => $obj_dosen->get_nip()
			);
			$this->session->set_userdata('info', $arr);
			$this->load->view('Peserta/Home');
		} 
	}

	*/

	public function logout(){
		$this->session->sess_destroy();
		redirect('Auth');
	}

	public function registration1(){

		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		if ($this->form_validation->run() == false ) {
			$this->load->view('Auth/Header');
			$this->load->view('Auth/Register');
			$this->load->view('Auth/Footer');
		} else {
			echo "data berhasil";
			$data =[
				'name' => htmlspecialchars($this->input->post('name','true')) 
			];
		}
	}

	public function registration(){

		$this->load->view('Auth/Register');
	}
}
