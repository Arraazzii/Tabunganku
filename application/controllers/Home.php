<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login', 'person');
		$this->load->model('Model_Profile', 'profil');
		$this->load->model('Model_Wishes', 'wish');
		$this->load->model('Model_Celeng', 'celeng');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	private function load($title = '', $datapath = '')
	{
		$page = array(
			"head" => $this->load->view('template/head', array("title" => $title), true),
			"sidebar" => $this->load->view('template/sidebar', false, true),
			"header" => $this->load->view('template/header', false, true),
			"main_js" => $this->load->view('template/main_js', false, true),
			"footer" => $this->load->view('template/footer', false, true)
		);
		return $page;
	}

	public function index()
	{
		if($this->session->userdata('login') == true){
			redirect('Home/dashboard');
		}
		
		if (isset($_GET['code'])) {
			
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('type','google');
			$this->session->set_userdata('user_profile', $this->googleplus->getUserInfo());
			redirect('Home/dashboard');
		} 	
		$contents['login_url'] = $this->googleplus->loginURL();
		$this->load->view('index',$contents);
	}

	public function dashboard(){
		error_reporting(0);
		if($this->session->userdata('login') != true){
			redirect('Home');
		}

		$username 	= $this->session->userdata('username');
		$bulan 		= date("m");
		$user 		= $this->person->readby($username);
		$celeng 	= $this->celeng->check_user_result($username);
		$debit  	= $this->celeng->grafik_debit($username, $bulan);
		$kredit  	= $this->celeng->grafik_kredit($username, $bulan);
		$debittotal = $this->celeng->debit_total($username, $bulan);
		$kreditotal = $this->celeng->kredit_total($username, $bulan);

		$newdata = array(
			'user' => $user,
			'celengan' => $celeng,
			'debit' => $debit,
			'kredit' => $kredit,
			'dt' => $debittotal,
			'kt' => $kreditotal
		);


		$path = "";
        $data = array(
            "page" => $this->load("Dashboard", $path) ,
            "content" => $this
            ->load
            ->view('dashboard', $newdata, true)
           );

        $this
        ->load
        ->view('template/default_template', $data);
	}

	public function profile(){
		if($this->session->userdata('login') != true){
			redirect('Home');
		}		

		$username = $this->session->userdata('username');
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$user = $this->person->readby($username);

		$newdata = array(
			'profile' => $contents['user_profile'],
			'user' => $user
		);
		
		$path = "";
        $data = array(
            "page" => $this->load("Profile", $path) ,
            "content" => $this
            ->load
            ->view('profile', $newdata, true)
           );

        $this
        ->load
        ->view('template/default_template', $data);
	}

	public function tabungan(){
		if($this->session->userdata('login') != true){
			redirect('Home');
		}		

		$username 	= $this->session->userdata('username');
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$user 		= $this->person->readby($username);
		$celeng 	= $this->celeng->tampil_celengan($username);
		$celeng1 	= $this->celeng->check_celengan($username);
		$history 	= $this->celeng->tampil_history($username);

		$newdata = array(
			'profile'		=> $contents['user_profile'],
			'user' 			=> $user,
			'celeng' 		=> $celeng,
			'history' 		=> $history,
			'checkcelengan' => $celeng1
		);
		
		$path = "";
        $data = array(
            "page" => $this->load("Tabungan", $path) ,
            "content" => $this
            ->load
            ->view('tabungan', $newdata, true)
           );

        $this
        ->load
        ->view('template/default_template', $data);
	}

	// Ajax Serverside
	public function get_alldata(){
        echo json_encode($this->celeng->get_alldata());
    }

    public function ajax_list()
	{
		$username = $this->session->userdata('username');
		$list = $this->celeng->get_datatables($username);
		$data = array();
		$no = 1;
		foreach ($list as $nabung) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $nabung->tanggal_menabung;
			$row[] = 'Rp. '.number_format($nabung->jumlah_nabung, 0, ".", ".").',00';
			$row[] = $nabung->catatan;
			if ($nabung->status == 0) {
				$status = 'Debit';
			} else {
				$status = 'Kredit';
			}
			$row[] = $status;
			$row[] = '
                  <a
                href="javascript:void(0)"
                data-id="'.$nabung->id.'"
                data-jumlah="'.$nabung->jumlah_nabung.'"
                data-tanggal="'.$nabung->tanggal_menabung.'"
                data-catatan="'.$nabung->catatan.'"
                data-toggle="modal" data-target="#edit-data"
                title="Edit Data">
                	<button class="btn btn-sm btn-info"><i class="tim-icons icon-pencil"></i></button>
                </a>
                <a 
                data-id="'.$nabung->id.'"
                data-jumlah="'.$nabung->jumlah_nabung.'"
                data-tanggal="'.$nabung->tanggal_menabung.'"
                data-catatan="'.$nabung->catatan.'"a
                data-toggle="modal" data-target="#hapus-data"
                title="Hapus Data">
                	<button class="btn btn-sm btn-danger"><i class="tim-icons icon-trash-simple"></i></button
                </a>
            ';


			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->celeng->count_all($username),
						"recordsFiltered" => $this->celeng->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
    // End Of Ajax Serverside

	public function menabung(){
		error_reporting(0);
		$username 		= $this->input->post('username');
	    $jumlah_uang	= $this->input->post('jumlah_uang');
	    $celengan 		= $this->input->post('celengan');
	    $deskripsi 		= $this->input->post('deskripsi');
	    $timestamp 		= date("Y-m-d H:i:s");

	    $data = array(
	      'username' => $username,
	      'jumlah_tabungan' => $jumlah_uang
	  	);

	    $otherdata = array(
	      'tanggal_menabung' 	=> $timestamp,
	      'jumlah_nabung' 		=> $jumlah_uang,
	      'celengan' 			=> $celengan,
	      'catatan' 			=> $deskripsi,
	      'username' 			=> $username,
	      'status' 				=> '0'
	  	);

	  	$this->celeng->history_nabung($username, $otherdata);
	  	$check 		= $this->celeng->check_user($username);
	  	$saatini 	= $check->jumlah_tabungan;
	    $hasil   	= $saatini + $jumlah_uang;
	    $itung 		= count($check);

	    if ($itung < 1) {
	    	$this->celeng->menabung($username, $data);
	    } else {
	    	$data = array(
	    		'jumlah_tabungan' => $hasil
	    	);
	    	$this->db->where('username', $username);
        	$this->db->update('table_simpanan', $data);
	    }

	    $box 				= $this->celeng->select_celengan($celengan);
	    $celengansaatini 	= $box->jumlah_uang;
	    $celenganbaru		= $celengansaatini + $jumlah_uang;
	    $dataceleng = array(
	    	'jumlah_uang' => $celenganbaru
	    );
	    $this->db->where('id', $celengan);
        $this->db->update('table_celengan', $dataceleng);
        $this->session->set_flashdata('notif','<div class="alert alert-info" role="alert" style="text-align: center"> Savings Successfully Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      	redirect('Home/tabungan');
	}

	// Hapus Keinginan
    public function hapus_Tabungan(){

    	$id     = $this->input->post('id');
        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->delete('table_nabung');

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Savings Successfully Deleted.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('Home/tabungan');

    }

    // Update
	public function edit_Tabungan()
	{
		$id 			= $this->input->post('id');
		$jumlah 		= $this->input->post('jumlah');
	    $tanggal 	 	= $this->input->post('tanggal');
	    $catatan 		= $this->input->post('catatan');

		$data = array(

			'jumlah_nabung' 	=> $jumlah,
			// 'tanggal_menabung' 	=> $tanggal,
			'catatan' 			=> $catatan
			
		);

        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->update('table_nabung', $data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! Savings Successfully Changed.
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/tabungan');
	}

	public function keinginan(){
		if($this->session->userdata('login') != true){
			redirect('Home');
		}		

		$username = $this->session->userdata('username');
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$user = $this->person->readby($username);
		$wish = $this->wish->tampil_Keinginan($username);

		$newdata = array(
			'profile' => $contents['user_profile'],
			'user' => $user,
			'wish' => $wish
		);
		
		$path = "";
        $data = array(
            "page" => $this->load("Keinginan", $path) ,
            "content" => $this
            ->load
            ->view('keinginan', $newdata, true)
           );

        $this
        ->load
        ->view('template/default_template', $data);
	}

	public function change_pass()
	{
	  $sess = $this->session->userdata('id');
	  $pass1 = $this->input->post('pass1');
      $pass2 = $this->input->post('pass2');
      $index = '0';

	  if ($pass1 != $pass2) {
	    alert('password tidak sama!');
	  } elseif ($pass1 == $pass2) {
	    $data = array(
	      'password' => md5($pass1),
	      'status' => '1'
	  );

	  $this->profil->update($sess, $data, $index);
	  $this->session->set_flashdata('notif','<div class="alert alert-info" role="alert" style="text-align: center"> Password Has Been Changed <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Home/dashboard');
	  }
	}

	public function change_profile()
	{
	  $sess 	= $this->session->userdata('id');
	  $username = $this->input->post('username');
      $fname 	= $this->input->post('fname');
      $lname 	= $this->input->post('lname');
      $index 	= '0';
	  
	  $data = array(
	      'username' => $username,
	      'nama_depan' => $fname,
	      'nama_belakang' => $lname
	  );

	  $this->profil->update($sess, $data, $index);
	  $this->session->set_flashdata('notif','<div class="alert alert-info" role="alert" style="text-align: center"> Data Has Been Changed <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Home/profile');
	}

	// Tambah Keinginan
	public function tambahKeinginan()
	{
		$sess 			= $this->input->post('username');
		$keinginan 		= $this->input->post('keinginan');
	    $batas_waktu 	= $this->input->post('batas_waktu');
	    $desc			= $this->input->post('desc');
	    $jumlah_uang	= $this->input->post('jumlah_uang');

		$data = array(

			'username'		=> $sess,
			'keinginan' 	=> $keinginan,
			'deadline' 		=> $batas_waktu,
			'jumlah_uang' 	=> $jumlah_uang,
			'deskripsi' 	=> $desc
			
		);

		$this->wish->simpan_Keinginan($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Wishes Successfully Added.
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/keinginan');
	}

	// Update
	public function updateKeinginan()
	{
		$id 			= $this->input->post('id');
		$keinginan 		= $this->input->post('keinginan');
	    $batas_waktu 	= $this->input->post('batas_waktu');
	    $jumlah_uang	= $this->input->post('jumlah_uang');

		$data = array(

			'keinginan' 	=> $keinginan,
			'deadline' 		=> $batas_waktu,
			'jumlah_uang' 	=> $jumlah_uang
			
		);

        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->update('table_keinginan', $data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Wishes Successfully Changed.
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/keinginan');
	}

	// Hapus Keinginan
    public function hapus_Keinginan(){
        $id = $this->input->post('id');

        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->delete('table_keinginan');

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Wishes Successfully Deleted.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('Home/keinginan');

    }

	// CELENGAN
	public function celengan(){
		if($this->session->userdata('login') != true){
			redirect('Home');
		}		

		$username = $this->session->userdata('username');
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$user = $this->person->readby($username);
		$celeng = $this->celeng->tampil_semua_celengan($username);

		$newdata = array(
			'profile' => $contents['user_profile'],
			'user' => $user,
			'celeng' => $celeng
		);
		
		$path = "";
        $data = array(
            "page" => $this->load("celengan", $path) ,
            "content" => $this
            ->load
            ->view('celengan', $newdata, true)
           );

        $this
        ->load
        ->view('template/default_template', $data);
	}

	// Tambah Celengan
	public function tambahcelengan()
	{
		$sess 			= $this->session->userdata('username');
		$namacelengan	= $this->input->post('namacelengan');
	    $deskripsi	 	= $this->input->post('deskripsi');

		$data = array(
			'username'		=> $sess,
			'nama_celengan' => $namacelengan,
			'deskripsi'		=> $deskripsi,
			'jumlah_uang' 	=> '0',
			'status' 		=> '0'
		);

		$this->celeng->simpan_celengan($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Money Box Successfully Added.
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/celengan');
	}

	// Update
	public function updatecelengan()
	{
		$id 			= $this->input->post('id');
		$namacelengan	= $this->input->post('namacelengan');
	    $deskripsi	 	= $this->input->post('deskripsi');

		$data = array(

			'nama_celengan' => $namacelengan,
			'deskripsi'		=> $deskripsi
			
		);

        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->update('table_celengan', $data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Money Box Successfully Changed.
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/celengan');
	}

	// Hapus Celengan
    public function hapus_celengan(){
        $id = $this->input->post('id');

        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->delete('table_celengan');

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Money Box Successfully Deleted.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('Home/celengan');

    }    

    public function tebok_celengan()
	{
		$id 	  	= $this->input->post('id');
		$username 	= $this->session->userdata('username');
		$box1 		= $this->celeng->select_celengan($id);
		$box 		= $this->celeng->check_user($username);
		$saatini 	= $box->jumlah_tabungan;
		$duitceleng = $box1->jumlah_uang;
		$hasil 		= $saatini - $duitceleng;
		$date 		= date("Y-m-d H:i:s");
		$desc 	  	= $this->input->post('catatan');


		$data = array(
			'status'	  => '1'
		);

		$otherdata = array(
			'tanggal_menabung' 	=> $date,
			'jumlah_nabung' 	=> $duitceleng,
			'catatan'			=> $desc,
			'status' 			=> '1',
			'username' 			=> $username
		);

		$this->celeng->history_nabung($username, $otherdata);

        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->update('table_celengan', $data);

        $data2 = array(
			'jumlah_tabungan' => $hasil
		);

        $this
        ->db
        ->where('username', $username);
        $this
        ->db
        ->update('table_simpanan', $data2);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Your Money Box Was Successfully Emptied
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/celengan');
	}

}
