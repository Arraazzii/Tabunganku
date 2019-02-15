<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Celeng extends CI_Model {

	function __construct() {
        $this->tableName = 'table_celengan';
        $this->primaryKey = 'id';
    }

    // Simpan Celengan
    public function simpan_celengan($data)
    {
        
        $query = $this->db->insert("table_celengan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    // Tampil Celengan
    public function tampil_celengan($username)
    {
    	$query = $this->db->select("*")
				 ->from('table_celengan')
				 ->where('username', $username)
				 ->order_by('id', 'ASC')
				 ->get();
		return $query->result();
    }
}
