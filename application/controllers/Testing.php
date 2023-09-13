<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testing extends CI_Controller {
	
	private $obj;

	function __construct(){
		parent:: __construct();
		$this->load->model('Master_jadwal');
		$this->load->library('unit_test');

		$this->obj = new Master_jadwal();


	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	private function diskon($a, $b){
		$d = $b*$a/100 ;
		return $b-$d;
	}

	public function tesdiskon(){
		$test = $this->diskon(50,50000);
		$expected_result = 25000;
		$test_name = 'Menguji tambah jadwal';
		echo $this->unit->run($test, $expected_result, $test_name);
	}

	public function testjadwalberhasil (){
		$insert_jadwal = new Jadwal();

		$insert_jadwal = '1';
		$insert_jadwal = '2022-02-22';
		$insert_jadwal = 'Blah blah';
		$hasil = $this->obj->insert($insert_jadwal);
		$this->assertEquals($hasil, 'True');
		echo $hasil;
	}
}
