<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_ruang extends CI_Model
{
    private $semua_ruang = array();
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ruang');
    }

    public function get_semua_ruang(bool $status){
        $this->semua_ruang = array();
        $this->db->select('*');
        $this->db->from('ruang');
        $this->db->where('status',$status);
        $query = $this->db->get();

        foreach($query->result() as $value){
            $this->semua_ruang[$value->id] = new Ruang($value->id);
        } 
        return $this->semua_ruang;
    }

    public function insert(Ruang $obj_ruang){
        $data = array(
            'nama_ruang' => $obj_ruang->get_nama(),
            'kapasitas' =>$obj_ruang->get_kapasitas(),
            'status' => 1
        );

        if($this->db->insert('ruang',$data)){
            $obj_ruang->set_id($this->db->insert_id());
            return true;
        }
        return false;
    }

    public function update1(Ruang $obj_ruang){
        $data = array(
            'status' => $obj_ruang->get_status()
        );

        $this->db->where('id',$obj_ruang->get_id());
        if($this->db->update('ruang',$data)){
            return true;
        } 
        return false;
    }

    public function delete_ruang($id){
        $this->db->delete('ruang',array('id' => $id));
    }

    public function get_ruang_id($id){
        $query = $this->db->get_where('ruang', array('id' =>$id));
        return $query;
    }

    public function update($id, $nama, $kapasitas, $status){
        $data = array(
            'nama_ruang' => $nama,
            'kapasitas' => $kapasitas,
            'status' =>$status
        );

        $this->db->where('id', $id);
        $this->db->update('ruang', $data);
    }
}