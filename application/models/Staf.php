<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staf extends CI_Model
{
    private $id = 0;
    private $nama ='';
    private $email ='';
    private $jabatan = array();

    function __construct($id = null)
    {
        parent::__construct();
        $this->load->database();

        $this->jabatan = array();

        if (!is_null($id)) {
            $this->db->select('a.*');
            $this->db->from('staf a');
            $this->db->where('a.id' , $id);
            $this->db->limit(1);
            $q2 =$this->db->get();

            if ($q2->num_rows() == 1) {
                $this->set_id($id);
                $this->set_nama($q2->row()->nama);
                $this->set_email($q2->row()->email);
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

    public function set_email($email) {
        $this->email = $email;
    }

    public function get_email() {
        return $this->email;
    }

}