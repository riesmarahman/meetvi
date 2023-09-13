<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Model
{
    private $id_jabatan = 0;
    private $nama_jabatan ='';

    function __construct($id = null)
    {
        parent::__construct();
        $this->load->database();

        if (!is_null($id)) {
            $dt = $this->db->where('id',$id)
            -> limit(1)
            ->get('ruang');

            if($dt->num_rows() == 1){
                $this->set_id($dt->row()->id_jabatan);
                $this->set_nama($dt->row()->nama_jabatan);
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
}