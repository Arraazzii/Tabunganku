<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Celeng extends CI_Model {

	function __construct() {
        $this->tableName = 'table_celengan';
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

    //Check User di Table Simpanan
    public function check_user($username){
        $query = $this->db->select("*")
                 ->from('table_simpanan')
                 ->where('username', $username)
                 ->get();
        return $query->row();
    }

    // Select Celengan
    public function select_celengan($username){
        $query = $this->db->select("*")
                 ->from('table_celengan')
                 ->where('id', $username)
                 ->get();
        return $query->row();
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

    //Menabung
    public function menabung($username, $data){
        $query = $this->db->insert("table_simpanan", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }

    // Tampil History Nabung
    public function tampil_history($username){
        $query = $this->db->select("*")
                 ->from('table_nabung')
                 ->where('username', $username)
                 ->order_by('id', 'ASC')
                 ->get();
        return $query->result();
    }

    //Insert History Nabung
    public function history_nabung($username ,$data){
        $query = $this->db->insert("table_nabung", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }
}
