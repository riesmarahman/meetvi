<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Model
{
    private $id = 0;
    private $nama ='';
    private $nik ='';
    private $nip ='';
    private $jabatan = '';
    private $prodi = '';

    function __construct($id = null)
    {
        parent::__construct();
        $this->load->database();

        if (!is_null($id)) {
            $this->db->select('a.*');
            $this->db->from('dosen a');
            $this->db->where('a.id' , $id);
            $this->db->limit(1);
            $q2 =$this->db->get();

            if ($q2->num_rows() == 1) {
                $this->set_id($id);
                $this->set_nama($q2->row()->nama);
                $this->set_nik($q2->row()->nik);
                $this->set_nip($q2->row()->nip);
                $this->set_jabatan($q2->row()->jabatan);
                $this->set_prodi($q2->row()->Prodi);

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

    public function set_nik($nik) {
        $this->nik = $nik;
    }

    public function get_nik() {
        return $this->nik;
    }

    public function set_nip($nip) {
        $this->nip = $nip;
    }

    public function get_nip() {
        return $this->nip;
    }    

    public function set_jabatan($jabatan) {
        $this->jabatan = $jabatan;
    }

    public function get_jabatan() {
        return $this->jabatan;
    }
    public function set_prodi($prodi) {
        $this->prodi = $prodi;
    }

    public function get_prodi() {
        return $this->prodi;
    }
}