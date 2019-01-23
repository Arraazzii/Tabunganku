<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login', 'person');
		$this->load->model('Model_Profile', 'profil');
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

	public function change_pass()
	{
	  $user = $this->session->userdata('username');
	  $pass1 = $this->input->post('pass1');
      $pass2 = $this->input->post('pass2');

	  $pass = $this->person->readby($user);
	  if ($pass1 != $pass2) {
	    alert('password tidak sama!');
	  } elseif ($pass1 == $pass2) {
	    $data = array(
	      'password' => md5($pass1),
	      'status' => '1'
	  );

	  $this->profil->updatePass($pass->username, $data);
	  $this->session->set_flashdata('notif','<div class="alert alert-info" role="alert" style="text-align: center"> Password Has Been Changed <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Home/dashboard');
	  }
	}

	public function change_profile()
	{
	  $userid 	= $this->session->userdata('id');
	  $username = $this->input->post('username');
      $fname 	= $this->input->post('fname');
      $lname 	= $this->input->post('lname');

	  $akun = $this->person->readby($userid);
	  
	  $data = array(
	      'username' => $username,
	      'nama_depan' => $fname,
	      'nama_belakang' => $lname
	  );

	  $this->profil->updateProfile($userid, $data);
	  $this->session->set_flashdata('notif','<div class="alert alert-info" role="alert" style="text-align: center"> Data Has Been Changed <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Home/profile', 'refresh');
	}

	public function logout(){
        $this->session->sess_destroy();
    }

	// public function daftar(){
 //        if($this->session->userdata('login') == true){
 //            redirect('Home/dashboard');
 //        }

 //        $newdata = array();

 //        $path = "";
 //        $data = array(
 //            "page" => $this->load("Daftar", $path) ,
 //            "content" => $this->load->view('daftar', $newdata, true)
 //           );
 //        $this->load->view('template/default_template', $data);
 //   }   
}
