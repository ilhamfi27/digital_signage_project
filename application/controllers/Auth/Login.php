<?php
/**
 * 
 * 
 */
class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('auth/login/index');
    }
    
    public function create_session(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username === "abcde" && $password === "1234") {
            redirect("dashboard/", "refresh");
        } else {
            redirect("login/", "refresh");
        }
    }

}
