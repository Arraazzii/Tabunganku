<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Celeng extends CI_Model {

    var $table          = 'table_nabung';
    var $column_order   = array('tanggal_menabung','jumlah_nabung','catatan'); //set column field database for datatable orderable
    var $column_search  = array('tanggal_menabung','jumlah_nabung','catatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where = array('username');
    var $order = array('id' => 'asc'); // default order

	function __construct() {
        $this->tableName = 'table_celengan';

        parent::__construct();
        $this->load->database();
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

    public function check_user_result($username){
        $query = $this->db->select("*")
                 ->from('table_simpanan')
                 ->where('username', $username)
                 ->get();
        return $query->result();
    }

    public function check_celengan($username){
        $query = $this->db->select("*")
                 ->from('table_celengan')
                 ->where('username', $username)
                 ->where('status', '0')
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
    public function tampil_semua_celengan($username)
    {
        $query = $this->db->select("*")
                 ->from('table_celengan')
                 ->where('username', $username)
                 ->order_by('id', 'ASC')
                 ->get();
        return $query->result();
    }

    // Tampil Celengan
    public function tampil_celengan($username)
    {
    	$query = $this->db->select("*")
				 ->from('table_celengan')
				 ->where('username', $username)
                 ->where('status', '0')
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

    private function _get_datatables_query($username)
    {
        $this->db->from($this->table);
        $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('id', 'DESC');

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($username)
    {
        $this->_get_datatables_query($username);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->db->from('table_nabung');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($username)
    {
        $this->db->from('table_nabung')
                 ->where('username', $username);
        $this->db->count_all_results();
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

    public function grafik_debit($username, $bulan){
        $query = $this->db->query("SELECT DATE(tanggal_menabung) AS waktu,SUM(jumlah_nabung) AS uang FROM table_nabung WHERE username = '$username' AND status = '0' AND MONTH(tanggal_menabung) = '$bulan' GROUP BY waktu");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function grafik_kredit($username, $bulan){
        $query = $this->db->query("SELECT DATE(tanggal_menabung) AS waktu,SUM(jumlah_nabung) AS uang FROM table_nabung WHERE username = '$username' AND status = '1' AND MONTH(tanggal_menabung) = '$bulan' GROUP BY waktu");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function debit_total($username, $bulan){
        $query = $this->db->query("SELECT SUM(jumlah_nabung) as uang FROM table_nabung WHERE username = '$username' AND status = '0' AND MONTH(tanggal_menabung) = '$bulan'");
        return $query->result();
    }

    public function kredit_total($username, $bulan){
        $query = $this->db->query("SELECT SUM(jumlah_nabung) as uang FROM table_nabung WHERE username = '$username' AND status = '1' AND MONTH(tanggal_menabung) = '$bulan'");
        return $query->result();
    }
}
