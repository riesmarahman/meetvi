<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Model
{
    private $id = 0;
    private $nama ='';
    private $kapasitas ='';
    private $status = '';

    function __construct($id = null)
    {
        parent::__construct();
        $this->load->database();

        if (!is_null($id)) {
            $data_ruang = $this->db->where('id',$id)
            -> limit(1)
            ->get('ruang');

            if($data_ruang->num_rows() == 1){
                $this->set_id($data_ruang->row()->id);
                $this->set_nama($data_ruang->row()->nama_ruang);
                $this->set_kapasitas($data_ruang->row()->kapasitas);
                $this->set_status($data_ruang->row()->status);
            }
        }
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_nama($nama) {
        $this->nama = $nama;
    }

    public function get_nama() {
        return $this->nama;
    }

    public function set_kapasitas($kapasitas) {
        $this->kapasitas = $kapasitas;
    }

    public function get_kapasitas() {
        return $this->kapasitas;
    }
    
    public function set_status($status){
        if(is_bool($status)){
            $this->status = $status;
        }
    }

    public function get_status() {
        return $this->status;
    }
}