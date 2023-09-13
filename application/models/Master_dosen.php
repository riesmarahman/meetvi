<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_dosen extends CI_Model
{
    private $semua_dosen = array();
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Dosen');
    }

    public function get_semua_dosen(){
        $this->semua_dosen = array();
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('id','DESC');
        $query = $this->db->get();

        foreach($query->result() as $value){
            $this->semua_dosen[$value->id] = new Dosen($value->id);
        } 
        return $this->semua_dosen;
    }
    
    public function get_dosen(){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('id','DESC');
        $query = $this->db->get();

        return $query;
    }

    public function insert(Dosen $obj_dosen){
        $data = array(
            'dosen' => $obj_dosen->get_dosen(),
            'tanggal' =>$obj_dosen->get_tgl(),
            'keterangan' =>$obj_dosen->get_keterangan()
        );

        $this->db->insert('jadwal_dosen', $data);

    }

    public function get_daftar_dosen(){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('jabatan', 'jabatan.id_jabatan=dosen.jabatan');
        $query = $this->db->get();
        return $query;
    }

    public function get_daftardosen(){
        $this->db->select('*');
        $this->db->from('dosen');
        $query = $this->db->get();
        return $query;
    }

    public function get_dosen_id($id){
        $query = $this->db->get_where('dosen', array('id' => $id));
        return $query;
    }

    public function get_jabatan(){
        $obj = array();
        $this->db->select('*');
        $q = $this->db->get('jabatan');
        $obj = $q->result_array();
        return $obj;
    }

    public function get_prodi(){
        $obj = array();
        $this->db->select('*');
        $q = $this->db->get('program-studi');
        $obj = $q->result_array();
        return $obj;
    }

    public function get_id_dosen($id){
        $query = $this->db->get_where('dosen', array('id' => $id));
        return $query;
    }
    public function get_id_akun($id){
        $query = $this->db->get_where('user-login', array('id' => $id));
        return $query;
    }

    public function get_jabatan_id($id){
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where('id_jabatan', $id);
        $query = $this->db->get();
        return $query;
    }

    public function insert_dosen(Dosen $obj_dosen){
        $data = array(
            'nama' => $obj_dosen->get_nama(),
            'nik' =>$obj_dosen->get_nik(),
            'nip' =>$obj_dosen->get_nip(),
            'jabatan' =>$obj_dosen->get_jabatan(),
            'prodi' =>$obj_dosen->get_prodi()
        );

        $this->db->insert('dosen', $data);

    }

    public function get_profil($dt){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('id', $dt);
        $q = $this->db->get();
        return $q;
    }
    public function get_akun($dt){
        $this->db->select('*');
        $this->db->from('user-login');
        $this->db->where('id', $dt);
        $q = $this->db->get();
        return $q;
    }

    public function update_profil($id, $username, $password){
        $data = array(
            'username' => $username,
            'password' => $password
        );

        $this->db->where('id', $id);
        $this->db->update('user-login', $data);
    }

}