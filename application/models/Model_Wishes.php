<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Wishes extends CI_Model {

	function __construct() {
        $this->tableName = 'table_keinginan';
        $this->primaryKey = 'id';
    }

    // Simpan Keinginan
    public function simpan_Keinginan($data)
    {
        
        $query = $this->db->insert("table_keinginan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    // Tampil Keinginan
    public function tampil_Keinginan($username)
    {
    	$query = $this->db->select("*")
				 ->from('table_keinginan')
				 ->where('username', $username)
				 ->order_by('id', 'ASC')
				 ->get();
		return $query->result();
    }
}
