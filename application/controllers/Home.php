<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
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

		$newdata = array();

		$path = "";
        $data = array(
            "page" => $this->load("User - Dashboard", $path) ,
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

		$contents['user_profile'] = $this->session->userdata('user_profile');

		$newdata = array(
			'profile' => $contents['user_profile'],
		);
		
		$path = "";
        $data = array(
            "page" => $this->load("User - Profile", $path) ,
            "content" => $this
            ->load
            ->view('profile', $newdata, true)
           );

        $this
        ->load
        ->view('template/default_template', $data);
	}

	public function daftar(){
        if($this->session->userdata('login') == true){
            redirect('Home/dashboard');
        }

        $newdata = array();

        $path = "";
        $data = array(
            "page" => $this->load("Daftar", $path) ,
            "content" => $this->load->view('daftar', $newdata, true)
           );
        $this->load->view('template/default_template', $data);
    }
}
