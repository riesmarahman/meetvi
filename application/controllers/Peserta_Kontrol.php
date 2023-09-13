<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_Kontrol extends CI_Controller {

	private $obj_rapat;
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('url','language'));
		$this->load->model('Master_rapat');

		if ($this->session->userdata('logged_in') == true){
			$this->obj_rapat = new Master_rapat();
		} else {
			redirect('Auth/load_login');
		}
	}

	public function index()
	{
	}

	public function lihat_undangan(){
		$id = $this->session->userdata['info']['id_dosen'];
		$data['undangan'] = $this->obj_rapat->lihat_undangan($id);
		$this->load->view('Peserta/Daftar_undangan', $data);
	}

	public function edit_data(){
		$id = $this->uri->segment(3);
		$result = $this->obj_rapat->get_lihat_undangan($id);
		if ($result->num_rows() > 0) {
			$i = $result->row_array();
			$data = array (
				'id_undangan_rapat' => $i['id_undangan_rapat'],
				'id_dosen' => $i['id_dosen']
			);
			$this->load->view('Peserta/Tambah_hasil_rapat', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function Tambah_hasil_rapat(){
		$id_udg = $this->input->post('input_id', TRUE);
		$id_dosen = $this->input->post('input_dosen', TRUE);
		$id_notula = $this->input->post('input_notula', TRUE);

		$this->obj_rapat->insert_hasil($id_udg, $id_dosen, $id_notula);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Notula berhasil ditambahkan.</div>');
		redirect('Peserta_Kontrol/Hasil_rapat');

	}

	public function hasil_rapat(){
		$id = $this->session->userdata['info']['id_dosen'];
		$data['hasil'] = $this->obj_rapat->lihat_hasil($id);
		$this->load->view('Peserta/hasil_rapat', $data);
	}
}