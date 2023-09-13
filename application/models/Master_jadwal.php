<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_jadwal extends CI_Model
{
    private $semua_jadwal = array();
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Jadwal');
    }

    public function get_jadwal($dt){
        $this->db->select('*');
        $this->db->from('jadwal_dosen');
        $this->db->where('dosen', $dt);

        $query = $this->db->get();
        return $query;
    }

    public function insert(Jadwal $obj_jadwal){
        $data = array(
            'dosen' => $obj_jadwal->get_dosen(),
            'tanggal' =>$obj_jadwal->get_tgl(),
            'keterangan' =>$obj_jadwal->get_keterangan()
        );

        $this->db->insert('jadwal_dosen', $data);

    }

    public function delete($id){
        $this->db->delete('jadwal_dosen',array('id' => $id));
    }

    public function get_jadwal_id($id){
        $query = $this->db->get_where('jadwal_dosen', array('id' =>$id));
        return $query;
    }

    public function update($id, $tanggal, $keterangan){
        $data = array(
            'tanggal' => $tanggal,
            'keterangan' => $keterangan
        );

        $this->db->where('id', $id);
        $this->db->update('jadwal_dosen', $data);
    }

    public function get_jadwal_semua($tgl, $prodi){
        $this->db->select('*');
        $this->db->from('jadwal_dosen');
        $this->db->where('tanggal' ,$tgl);
        $this->db->join('dosen','dosen.id=jadwal_dosen.dosen');
        $this->db->join('program-studi','program-studi.id_program_studi = dosen.Prodi');
        $this->db->where('Prodi', $prodi);
        $query = $this->db->get();
        return $query;
    }

}