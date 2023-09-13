<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Model
{
    private $id = 0;
    private $nama ='';
    private $prodi = array();

    function __construct($id = null)
    {
        parent::__construct();
        $this->load->database();
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
}