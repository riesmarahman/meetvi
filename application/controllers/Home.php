<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('URL');

		if (isset($this->session->userdata['logged_in'])) {
		} else {
			redirect('Auth');
		}
	}

	public function index()
	{
		$userdata = $this->session->userdata['logged_in'];

		if (is_pimpinan($userdata)){
			$this->load->view('Pimpinan/Home');
		} elseif (is_sekretaris($userdata)){
			$this->load->view('Sekretaris/Home');
		} elseif (is_peserta($userdata)){
			$this->load->view('Peserta/Home');
		} elseif (is_notulis($userdata)){
			$this->load->view('Admin/Home');
		}
	}
}