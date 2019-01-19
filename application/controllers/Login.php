<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_login');
    }

    public function auth_login(){
        try {
            $username = $this->input->post('user');
            $password = md5($this->input->post('pass'));
            $data = $this->Auth_login->readBy($username, $password);
            if (isset($data->email) && isset($data->password)) {
                if($username === $data->email && $password === $data->password){
                       $newdata = array(
                        'email'  => $data->username,
                        'id'  => $data->id,
                    );
                    $this->session->set_userdata($newdata);
                    redirect('Home/dashboard');            
                    } else {
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Masukkan Email & Password Dengan Benar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Login');
                }

            } else {
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Email atau Password yang Anda Masukkan Tidak Valid <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Login');
            }
        } catch(Exception $e) {
            redirect('Login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->googleplus->revokeToken();
        redirect('');
    }
}