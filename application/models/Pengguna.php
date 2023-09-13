<?php

class Pengguna extends CI_Model
{
    public $username ='';
    public $password ='';
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function set_username($username){
        $this->username = $username;
    }

    public function get_username(){
        return $this->username;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function get_password(){
        return $this->password;
    }

    public function set_peran($peran){
        $this->peran = $peran;
    }

    public function get_peran(){
        return $this->peran;
    }

    public function set_id_dosen($id_dosen){
        $this->id_dosen = $id_dosen;
    }

    public function get_id_dosen(){
        return $this->id_dosen;
    }

    public function login(){
        $this->db->select('a.username, a.peran as peran, a.id_dosen as id_dosen, a.id_staf as id_staf');
        $this->db->from('user-login a');
        $this->db->join('peran b', 'b.id=a.peran', 'left');
        $this->db->where('a.username',$this->username);
        $this->db->where('a.password',$this->password);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row()->peran.'&'.$query->row()->id_dosen.'&'.$query->row()->id_staf;
        } else {
            return FALSE;
        }
    }

    public function get_daftar_akun(){
        $this->db->select('*');
        $this->db->from('user-login');
        $this->db->join('peran', 'peran.id=user-login.peran');
        $query = $this->db->get();
        return $query;
    }

    public function insert(Pengguna $obj){
        $data = array(
            'username' => $obj->get_username(),
            'password' => $obj->get_password(),
            'peran' => $obj->get_peran(),
            'id_dosen' => $obj->get_id_dosen(),
        );
        $this->db->insert('user-login', $data);
    }

        public function get_profil($id){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }
}