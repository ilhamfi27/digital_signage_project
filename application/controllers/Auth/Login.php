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

        if ($username === "sherli" && $password === "1234") {
            redirect("add_ons/", "refresh");
        } else {
            redirect("login/", "refresh");
        }
    }

}
