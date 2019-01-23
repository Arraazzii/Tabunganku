<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Profile extends CI_Model {

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
    
    public function updatePass($id, $serialize) {
        return $this->db->where($this->COLUMN[1], $id)
            ->update($this->TABLE, $serialize);
    }

    public function updateProfile($id, $serialize) {
        return $this->db->where($this->COLUMN[0], $id)
            ->update($this->TABLE, $serialize);
    }
    
}