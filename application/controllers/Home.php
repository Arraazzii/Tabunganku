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
		if($this->session->userdata('login') != true){
			redirect('Home');
		}

		$username = $this->session->userdata('username');
		$user = $this->person->readby($username);

		$newdata = array(
			'user' => $user,
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

		$username = $this->session->userdata('username');
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$user = $this->person->readby($username);

		$newdata = array(
			'profile' => $contents['user_profile'],
			'user' => $user
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
	    $jumlah_uang	= $this->input->post('jumlah_uang');

		$data = array(

			'username'		=> $sess,
			'keinginan' 	=> $keinginan,
			'deadline' 		=> $batas_waktu,
			'jumlah_uang' 	=> $jumlah_uang
			
		);

		$this->wish->simpan_Keinginan($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
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

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/keinginan');
	}

	// Hapus Keinginan
    public function hapus_Keinginan(){
        $kode = $this->uri->segment(3);

        $this
        ->db
        ->where('id', $kode);
        $this
        ->db
        ->delete('table_keinginan');

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Kode Klui telah di hapus.
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
		$celeng = $this->celeng->tampil_celengan($username);

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
		$sess 			= $this->input->post('username');
		$namacelengan	= $this->input->post('namacelengan');
	    $deskripsi	 	= $this->input->post('deskripsi');

		$data = array(

			'username'		=> $sess,
			'nama_celengan' => $namacelengan,
			'deskripsi'		=> $deskripsi,
			'jumlah_uang' 	=> '0'
		);

		$this->celeng->simpan_celengan($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
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

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
			<button type="button" class="close" data-dismiss="alert">&times</button>
			                                    </div>');

		//redirect
		redirect('Home/celengan');
	}

	// Hapus Celengan
    public function hapus_celengan(){
        $kode = $this->uri->segment(3);

        $this
        ->db
        ->where('id', $kode);
        $this
        ->db
        ->delete('table_celengan');

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Celengan telah di hapus.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('Home/celengan');

    }    

}
