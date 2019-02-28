<?php
/**
 * 
 * 
 */
class Register extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $this->load->view('auth/register/index');
    }

    public function register_user() {
        $username           = $this->input->post('username');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $confirm_password   = $this->input->post('confirm_password');

        $this->form_validation->set_rules([
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[30]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|min_length[3]|max_length[30]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]|max_length[30]'
            ],
            [
                'field' => 'confirm_password',
                'label' => 'Retype password',
                'rules' => 'trim|required|min_length[6]|max_length[30]|matches[password]'
            ]
        ]);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/register/index');
        } else {
            redirect('auth/login/');
        }
    }
}
