<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model {

    var $TABLE = "table_user";
    var $COLUMN = array(
        "id",
        "username",
        "password",
        "nama_depan",
        "nama_belakang",
        "tanggal_daftar",
        "photo",
        "status"
    );

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function readBy($username){
        try {
            $this->db->select('*');
            // $this->db->select($this->COLUMN[0].",".$this->COLUMN[1].",".$this->COLUMN[2].",".$this->COLUMN[3].",".$this->COLUMN[4].",".$this->COLUMN[5]);
            $this->db->from($this->TABLE);
            $this->db->where($this->COLUMN[1], $username);
            $query = $this->db->get();
            return $query->row();
        }
        catch (Exception $e){
            return null;
        }
    }
    
}