<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat extends CI_Model
{
    private $id = 0;
    private $topik ='';
    private $pimpinan ='';
    private $tgl_pelaksanaan = '';
    private $waktu ='';
    private $id_jur ='';
    private $id_prodi ='';
    private $status ='';

    
    function __construct($id = null)
    {
        parent::__construct();
        $this->load->database();

        if(!is_null($id)){
            $data_rapat = $this->db->where('id', $id)
            -> limit (1)
            -> get('rapat');

            if ($data_rapat->num_rows() == 1) {
                $this->set_id($data_rapat->row()->id);
                $this->set_topik($data_rapat->row()->topik);
                $this->set_pimpinan($data_rapat->row()->pimpinan);
                $this->set_tgl_pelaksanaan($data_rapat->row()->tgl_pelaksanaan);
                $this->set_waktu($data_rapat->row()->waktu);
                $this->set_id_jur($data_rapat->row()->id_jur);
                $this->set_id_prodi($data_rapat->row()->id_prodi);
                $this->set_status($data_rapat->row()->status);
            }
        }
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_topik($topik) {
        $this->topik = $topik;
    }

    public function get_topik() {
        return $this->topik;
    }

    public function set_pimpinan($pimpinan) {
        $this->pimpinan = $pimpinan;
    }

    public function get_pimpinan() {
        return $this->pimpinan;
    }

    public function set_tgl_pelaksanaan($tgl_pelaksanaan) {
        $this->tgl_pelaksanaan = $tgl_pelaksanaan;
    }

    public function get_tgl_pelaksanaan() {
        return $this->tgl_pelaksanaan;
    }

    public function set_waktu($waktu) {
        $this->waktu = $waktu;
    }

    public function get_waktu() {
        return $this->waktu;
    }

    public function set_id_jur($id_jur) {
        $this->id_jur = $id_jur;
    }

    public function get_id_jur() {
        return $this->id_jur;
    }

    public function set_id_prodi($id_prodi) {
        $this->id_prodi = $id_prodi;
    }

    public function get_id_prodi() {
        return $this->id_prodi;
    }

        public function set_status($status) {
        $this->status = $status;
    }

    public function get_status() {
        return $this->status;
    }
}