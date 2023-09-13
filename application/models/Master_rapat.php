<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_rapat extends CI_Model
{
    private $semua_rapat = array();
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Rapat');
    }

    public function get_rapat($id){
        $this->db->select('id, topik, pimpinan, tgl_pelaksanaan, waktu, nama_jurusan, nama_prodi');
        $this->db->from('rapat');
        $this->db->join('jurusan','id_jur = id_jurusan','left');
        $this->db->join('program-studi','id_prodi = id_program_studi','left');
        $this->db->where('pimpinan',$id);
        $query = $this->db->get();
        return $query;
    }

    public function get_jurusan(){
        $obj = array();
        $this->db->select('*');
        $q = $this->db->get('jurusan');
        $obj = $q->result_array();

        return $obj;
    }

    public function get_prodi($id){
        $query = $this->db->get_where('program-studi', array('jurusan_id' => $id));
        return $query;
    }

    public function get_dosen_id($id){
        $query = $this->db->get_where('dosen', array('id' => $id));
        return $query;
    }

    public function save_rapat($id_jurusan,$id_prodi,$pimpinan_rapat,$topik,$tgl,$waktu){
        $data = array(
            'id_jur' => $id_jurusan,
            'id_prodi' => $id_prodi,
            'topik' => $topik,
            'pimpinan' =>$pimpinan_rapat,
            'tgl_pelaksanaan' =>$tgl,
            'waktu' => $waktu
        );
        $this->db->insert('Rapat', $data);
    }

    public function get_rapat_id($id){
        $query = $this->db->get_where('rapat', array('id' =>$id));
        return $query;
    }

    public function update($id ,$topik, $pimpinan, $tgl_pelaksanaan, $waktu, $id_jur, $id_prodi){
        $data = array(
            'topik' => $topik,
            'pimpinan' => $pimpinan,
            'tgl_pelaksanaan' =>$tgl_pelaksanaan,
            'waktu' => $waktu,
            'id_jur' => $id_jur,
            'id_prodi' => $id_prodi
        );
        $this->db->where('id', $id);
        $this->db->update('rapat', $data);
    }

    public function delete_rapat($id){
        $this->db->delete('rapat',array('id' => $id));
    }
    public function delete_hrapat($id){
        $this->db->delete('hasil_rapat',array('id_hasil' => $id));
    }
    public function getrapat_skr($status){
        $this->db->select('id, topik, pimpinan, tgl_pelaksanaan, waktu, nama_jurusan, nama_prodi');
        $this->db->from('rapat');
        $this->db->where('status',$status);
        $this->db->join('jurusan','id_jur = id_jurusan','left');
        $this->db->join('program-studi','id_prodi = id_program_studi','left');
        $query = $this->db->get();
        return $query;
    }

    public function get_ruang1(bool $status){
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

    public function get_ruang(bool $status){
        $obj = array();
        $this->db->select('*');
        $this->db->where('status', $status);
        $q = $this->db->get('ruang');
        $obj = $q->result_array();

        return $obj;
    }

    public function get_undangan_rapat(){
        $obj = array();
        $this->db->select('*');
        $this->db->from('undangan_rapat','Rapat');
        $this->db->join('rapat','rapat.id=undangan_rapat.id_rapat');
        $this->db->join('ruang','ruang.id=undangan_rapat.id_ruang');
        $this->db->join('program-studi','program-studi.id_program_studi=rapat.id_prodi');
        $q = $this->db->get();
        $obj = $q->result_array();
        return $obj;
    }

    public function get_undangan_rapat_dosen(){
        $obj = array();
        $this->db->select('*');
        $this->db->from('jadwal_rapat');
        $this->db->join('dosen','dosen.id=jadwal_rapat.id_dosen');
        $q = $this->db->get();
        $obj = $q->result_array();
        return $obj;
    }

    public function insert_undangan($id_rapat, $id_ruang, $status){
        $data = array(
            'id_rapat' => $id_rapat,
            'id_ruang' => $id_ruang,
        );
        if ($this->db->insert('undangan_rapat', $data)){
            $this->db->where('id',$id_rapat);
            $this->db->update('rapat', array('status' =>$status));
            return true;
        }
        return false;
    }

    public function get_undangan_id($id){
        $query = $this->db->get_where('undangan_rapat', array('id_undangan' =>$id));
        return $query;
    }

    public function get_dosen(){
        $obj = array();
        $this->db->select('*');
       // $this->db->where('Prodi', $dt);
        $q = $this->db->get('dosen');
        $obj = $q->result_array();
        return $obj;
    }

    public function get_prodi_ud(){
        $obj = array();
        $this->db->select('*');
        $q = $this->db->get('program-studi');
        $obj = $q->result_array();
        return $obj;
    }

    public function kirim_undangan($id_undangan, $id_dosen){
        $data = array(
            'id_undangan_rapat' => $id_undangan,
            'id_dosen' => $id_dosen
        );
        $this->db->insert('jadwal_rapat', $data);

    }

    public function get_lihat_undangan($id){
        $query = $this->db->get_where('jadwal_rapat', array('id_undangan_rapat' =>$id));
        return $query;
    }

    public function insert_hasil($id_udg, $id_dosen, $id_notula){
        $data = array(
            'rapat_undangan_id' => $id_udg,
            'dosen_id' => $id_dosen,
            'Notula' => $id_notula
        );
        if ($this->db->insert('hasil_rapat', $data)){
            $this->db->where('id_undangan',$id_udg);
            $status = 1;
            $this->db->update('undangan_rapat', array('status' =>$status));
            return true;
        }
        return false;
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

    public function lihat_undangan($id){
        $obj = array();
        $this->db->select('*');
        $this->db->from('jadwal_rapat','undangan_rapat');
        $this->db->where('jadwal_rapat.id_dosen', $id);
        $this->db->where('undangan_rapat.status', 0);
        $this->db->join('undangan_rapat','undangan_rapat.id_undangan=jadwal_rapat.id_undangan_rapat');
        $this->db->join('dosen','dosen.id=jadwal_rapat.id_dosen');
        $this->db->join('ruang','ruang.id=undangan_rapat.id_ruang');
        $this->db->join('rapat','rapat.id=undangan_rapat.id_rapat');
        $q = $this->db->get();
        $obj = $q->result_array();
        return $obj;
    }

    public function lihat_hasil(){
        $obj = array();
        $this->db->select('*');
        $this->db->from('hasil_rapat','undangan_rapat','jadwal_rapat');
        $this->db->join('undangan_rapat','undangan_rapat.id_undangan=hasil_rapat.rapat_undangan_id');
        $this->db->join('dosen','dosen.id=hasil_rapat.dosen_id');
        $this->db->join('ruang','ruang.id=undangan_rapat.id_ruang');
        $this->db->join('rapat','rapat.id=undangan_rapat.id_rapat');
        $q = $this->db->get();
        $obj = $q->result_array();
        return $obj;
    }

    public function get_hasil_rapat(){
        $obj = array();
        $this->db->select('*');
        $this->db->from('hasil_rapat','undangan_rapat');
        $this->db->join('dosen','dosen.id = hasil_rapat.dosen_id');
        $this->db->join('undangan_rapat','undangan_rapat.id_undangan = hasil_rapat.rapat_undangan_id');
        $this->db->join('rapat','rapat.id = undangan_rapat.id_rapat');
        $this->db->join('ruang','ruang.id=undangan_rapat.id_ruang');

        $q = $this->db->get();
        $obj = $q->result_array();
        return $obj;
    }

    public function get_hasil_rapat_id($id){
        $query = $this->db->get_where('hasil_rapat', array('id_hasil' =>$id));
        return $query;
    }

        public function update_hasil($a ,$b, $c, $d){
        $data = array(
            'id_hasil' => $a,
            'rapat_undangan_id' => $b,
            'dosen_id' =>$c,
            'Notula' => $d
        );
        $this->db->where('id_hasil', $a);
        $this->db->update('hasil_rapat', $data);
    }
}