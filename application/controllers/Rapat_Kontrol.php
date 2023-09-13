<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat_Kontrol extends CI_Controller {

	private $obj_mrapat;
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('url','language'));
		$this->load->model('Master_rapat');

		if ($this->session->userdata('logged_in') == true){
			$this->obj_mrapat = new Master_rapat();
		} else {
			redirect('Auth/load_login');
		}
	}

	public function index()
	{
		$id = $this->session->userdata['info']['id_dosen'];
		$data['rapat'] = $this->obj_mrapat->get_rapat($id);
		$this->load->view('Pimpinan/Daftar_Rapat', $data);
	}

	public function jurusan(){
		$data['jurusan'] = $this->obj_mrapat->get_jurusan();
		$this->load->view('Pimpinan/Tambah_Rapat', $data);
	}

	public function get_prodi(){
		$prodi_id = $this->input->post('id',TRUE);
		$data = $this->obj_mrapat->get_prodi($prodi_id)->result();
		echo json_encode($data);
	}

	public function Tambah_Rapat()
	{
		$id_jurusan = $this->input->post('jurusan',TRUE);
		$id_prodi = $this->input->post('prodi',TRUE);
		$Pimpinan_rapat = $this->session->userdata['info']['id_dosen'];
		$topik = $this->input->post('input_topik',TRUE);
		$tgl_pelaksanaan= $this->input->post('input_tanggal',TRUE);
		//$tgl = date('Y-m-d', strtotime($tgl_pelaksanaan)); 
		$waktu = $this->input->post('input_waktu',TRUE);

		$this->obj_mrapat->save_rapat($id_jurusan,$id_prodi,$Pimpinan_rapat,$topik,$tgl_pelaksanaan,$waktu);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Rapat berhasil disimpan</div>');
		redirect('Rapat_Kontrol');
	}

	public function edit_data(){
		$id = $this->uri->segment(3);
		$result = $this->obj_mrapat->get_rapat_id($id);
		if($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id' => $i['id'],
				'topik' => $i['topik'],
				'tanggal' => $i['tgl_pelaksanaan'],
				'waktu' => $i ['waktu']
			);
			$this->load->view('Pimpinan/Ubah_rapat', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function ubah_rapat(){
		$id = $this->input->post('id');
		$topik = $this->input->post('input_topik');
		$pimpinan = $this->session->userdata['info']['id_dosen'];
		$tgl_pelaksanaan = $this->input->post('input_tanggal');
		$waktu = $this->input->post('input_waktu');
		$id_jur = $this->input->post('jurusan');
		$id_prodi = $this->input->post('input_prodi');
		$this->Master_rapat->update($id, $topik, $pimpinan, $tgl_pelaksanaan, $waktu, $id_jur, $id_prodi);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Rapat Updated</div>');
		redirect('Rapat_Kontrol');
	}

	public function hapus_rapat()
	{	
		$id = $this->uri->segment(3);
		$this->obj_mrapat->delete_rapat($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Ruang Deleted</div>');
		redirect ('Rapat_Kontrol');
	}

	public function edit_data_hasil(){
		$id = $this->uri->segment(3);
		$result = $this->obj_mrapat->get_hasil_rapat_id($id);
		if($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id' => $i['id_hasil'],
				'rapat_undangan_id' => $i['rapat_undangan_id'],
				'dosen_id' => $i['dosen_id'],
				'notula' => $i ['Notula']
			);
			$this->load->view('Pimpinan/Ubah_hasil_rapat', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function ubah_hasil_rapat(){
		$id = $this->input->post('input_id_hasil');
		$rpt_udg = $this->input->post('input_id_undangan');
		$dsn = $this->input->post('input_dosen');
		$notula = $this->input->post('input_notula');
		$this->obj_mrapat->update_hasil($id, $rpt_udg, $dsn, $notula);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Rapat Updated</div>');
		redirect ('Pimpinan_Kontrol/lihat_hasil_rapat');

	}

	public function hapus_hasil_rapat()
	{	
		$id = $this->uri->segment(3);
		$this->obj_mrapat->delete_hrapat($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Ruang Deleted</div>');
		redirect ('Pimpinan_Kontrol/lihat_hasil_rapat');
		
	}
}