<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekretaris_Kontrol extends CI_Controller {

	private $obj_rapat;
	public function __construct(){
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
		$status = 0;
		$data ['dt_rapat'] = $this->obj_rapat->getrapat_skr($status);
		$this->load->view('Sekretaris/daftar_rapat', $data);
	}

	public function edit_data(){
		$id = $this->uri->segment(3);
		$result = $this->obj_rapat->get_rapat_id($id);
		if($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id' => $i['id'],
				'topik' => $i['topik'],
				'tanggal' => $i['tgl_pelaksanaan'],
				'waktu' => $i['waktu'],
				'jurusan' => $i['id_jur'],
				'prodi' => $i['id_prodi']
			);
			$data['ruang'] = $this->obj_rapat->get_ruang(TRUE);

			$this->load->view('Sekretaris/tambah_undangan', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function tambah_undangan(){
		$id_rapat = $this->input->post('id_rapat',TRUE);
		$id_ruang = $this->input->post('input_ruang', TRUE);
		$status = $this->input->post('input_status', TRUE);

		$this->obj_rapat->insert_undangan($id_rapat, $id_ruang, $status);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Undangan berhasil ditambahkan.</div>');
		redirect('Sekretaris_Kontrol/Daftar_undangan');
	}

	public function Daftar_undangan(){
		$data ['undangan'] = $this->obj_rapat->get_undangan_rapat();
		$this->load->view('Sekretaris/daftar_undangan', $data);
	}

	public function edit_data_undangan(){
		$id = $this->uri->segment(3);
		$result = $this->obj_rapat->get_undangan_id($id);
		if($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id_undangan' => $i['id_undangan'],
				'id_rapat' => $i['id_rapat'],
				'id_ruang' => $i['id_ruang']
			);

			$obj = new Rapat();
			$dt = 1;
			$data['dosen'] = $this->obj_rapat->get_dosen();

			$this->load->view('Sekretaris/Kirim_undangan', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function get_dosen(){
		$dosen_id = $this->input->post('id',TRUE);
		$data = $this->obj_mrapat->get_dosen_id($dosen_id)->result();
		echo json_encode($data);
	}

	public function kirim_undangan(){
		
		$id_undangan = $this->input->post('input_id',TRUE);
		$id_dosen = $this->input->post('input_dosen', true);

		$this->obj_rapat->kirim_undangan($id_undangan, $id_dosen);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Undangan berhasil dikirim.</div>');
		redirect('Sekretaris_Kontrol/Daftar_undangan_dosen');
	}

	public function Daftar_undangan_dosen(){
		$data ['undangan'] = $this->obj_rapat->get_undangan_rapat_dosen();
		$this->load->view('Sekretaris/daftar_undangan_dosen', $data);
	}
}
