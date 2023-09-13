<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_Kontrol extends CI_Controller {
	private $obj_mruang;
	public function __construct(){
		parent:: __construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('url','language'));
		$this->load->model('Master_ruang');

		if ($this->session->userdata('logged_in') == true){
			$this->obj_mruang = new Master_ruang();
		} else {
			redirect('Auth/load_login');
		}
	}

	public function index()
	{
		$data ['daftar_ruang']['Tersedia'] = $this->obj_mruang->get_semua_ruang(TRUE);
		$data ['daftar_ruang']['Tidak Tersedia'] = $this->obj_mruang->get_semua_ruang(FALSE);
		$this->load->view('Sekretaris/Daftar_Ruang', $data);
	}

	public function tambah_ruang()
	{
		$this->form_validation->set_rules('input_nama_ruang','Nama Ruang :', 'required|max_length[30]');
		$this->form_validation->set_rules('input_kapasitas','Kapasitas :','required|max_length[30]');

		if($this->form_validation->run() == FALSE){
			$this->load->view('Sekretaris/tambah_ruang');		
		} else {
			$ruang_baru = new Ruang();
			$ruang_baru->set_nama(set_value('input_nama_ruang'));
			$ruang_baru->set_kapasitas(set_value('input_kapasitas'));
			$ruang_baru->set_status(TRUE);
			$this->obj_mruang->insert($ruang_baru);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Ruang berhasil ditambahkan.</div>');
			redirect('Ruang_Kontrol');
		}

	}

	public function ubah_ruang1 ($id_ruang)
	{
		$ruang_diubah = new Ruang($id_ruang);
		$data['ruang'] = $ruang_diubah;

		$this->form_validation->set_rules('input_status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Sekretaris/Ubah_Ruang', $data);
		} else {
			$ruang_diubah->set_nama(set_value('input_nama_ruang'));
			$ruang_diubah->set_kapasitas(set_value('input_kapasitas'));
			$ruang_diubah->set_status(set_value(boolval($this->input->post('input_status'))));
			$this->obj_mruang->update($ruang_diubah);
			redirect('Ruang_Kontrol');
		}
	}

	public function hapus_ruang()
	{	
		$id = $this->uri->segment(3);
		$this->obj_mruang->delete_ruang($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Rapat Deleted</div>');
		redirect ('Ruang_Kontrol');
	}
	

	public function edit_data(){
		$id = $this->uri->segment(3);
		$result = $this->obj_mruang->get_ruang_id($id);
		if ($result->num_rows() > 0){
			$i = $result->row_array();
			$data = array (
				'id' => $i['id'],
				'nama' => $i['nama_ruang'],
				'kapasitas' =>$i['kapasitas'],
				'status' =>$i['status']  
			);
			$this->load->view('Sekretaris/Ubah_ruang', $data);
		} else {
			echo "Data was not found";
		}
	}

	public function Ubah_ruang(){
		$id = $this->input->post('id');
		$nama = $this->input->post('input_nama_ruang');
		$kapasitas = $this->input->post('input_kapasitas');
		$status = $this->input->post('input_status');
		$this->Master_ruang->update($id, $nama, $kapasitas, $status);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Ruang berhasil diubah.</div>');
		redirect('Ruang_Kontrol');
	}
}
