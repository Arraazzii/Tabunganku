<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Login', 'person');
    }

    public function auth_login(){
            $username = $this->input->post('user');
            $password = md5($this->input->post('pass'));
            $data = $this->person->readBy($username, $password);
            if (isset($data->username) && isset($data->password)) {
                if($username === $data->username && $password === $data->password){
                       $newdata = array(
                        'username'  => $data->username,
                        'id'        => $data->id,
                        'login'     => true,
                        'type'      => 'local'
                    );
                    $this->session->set_userdata($newdata);
                    redirect('Home/dashboard');            
                    } else {

                    $this->session->set_flashdata("globalmsg", "Enter Username & Password Correctly.");

                    redirect('Home');
                }
            } else {

                $this->session->set_flashdata("globalmsg", "The Username Or Password You Entered Is Not Registered.");

                redirect('Home');
            }
    }

    public function login_guest() {
        $id         = rand(1,99999).rand(1,99999).rand(1,99999).rand(1,99999);
        $username   = $this->input->post('username');
        $pass       = $this->randpass();
        $password   = md5($pass);
        $photo      = "default-avatar.png";

        $log_gs = array(
          'id' => $id,
          'username' => $username,
          'password' => $password,
          'nama_depan' => "Guest",
          'nama_belakang' => rand(1,99999999),
          'photo' => $photo,
          'status' => '0'
        );

        $this->db->insert("table_user", $log_gs);
        $newdata = array(
            'username'  => $username,
            'id'        => $id,
            'login'     => true,
            'type'      => 'local'
        );
        $this->session->set_userdata($newdata);
        redirect('Home/dashboard'); 
    }

    public function randpass(){
        //    karakter password
        $string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_";
        $len = strlen($string);
        $pass = '';
        
        //    generate password
        for($i = 0; $i <='6'; $i++){
          $pass .= $string[rand(0, $len - 1)];
        }
        return $pass;
  }

    public function logout(){
        $this->session->sess_destroy();
        $this->googleplus->revokeToken();
        redirect('Home');
    }
}
