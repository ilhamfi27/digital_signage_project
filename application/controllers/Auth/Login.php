<?php
/**
 * 
 * 
 */
class Login extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('view_partial');
    }

    public function index(){
        $this->load->view('auth/login/index');
    }
    
    public function create_session(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login/index');
        } else {
            if ($username === "admin" && $password === "admin") {
                redirect("dashboard/", "refresh");
            } else {
                redirect("login/", "refresh");
            }
        }
    }
}
