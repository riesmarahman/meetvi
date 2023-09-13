<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Model
{
    private $id = 0;
    private $tgl ='';
    private $keterangan ='';
    private $dosen = '';

    function __construct($id = null)
    {
        parent::__construct();
        $this->load->database();

        if (!is_null($id)) {
            $data_jadwal = $this->db->where('id',$id)
            -> limit(1)
            ->get('jadwal_dosen');

            if($data_ruang->num_rows() == 1){
                $this->set_id($data_jadwal->row()->id);
                $this->set_dosen($data_jadwal->row()->dosen);
                $this->set_tgl($data_jadwal->row()->tanggal);
                $this->set_keterangan($data_jadwal->row()->keterangan);
            }
        }
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_dosen($dosen) {
        $this->dosen = $dosen;
    }

    public function get_dosen() {
        return $this->dosen;
    }

    public function set_tgl($tgl) {
        $this->tgl = $tgl;
    }

    public function get_tgl() {
        return $this->tgl;
    }
    public function set_keterangan($keterangan) {
        $this->keterangan = $keterangan;
    }

    public function get_keterangan() {
        return $this->keterangan;
    }

}