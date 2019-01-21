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
            if (isset($data->email) && isset($data->password)) {
                if($username === $data->email && $password === $data->password){
                       $newdata = array(
                        'username'  => $data->email,
                        'id'  => $data->id,
                        'login' => true
                    );
                    $this->session->set_userdata($newdata);
                    redirect('Home/dashboard');            
                    } else {
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Masukkan Email & Password Dengan Benar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Home');
                }
            } else {
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Email atau Password yang Anda Masukkan Tidak Terdaftar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Home');
            }
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->googleplus->revokeToken();
        redirect('Home');
    }
}