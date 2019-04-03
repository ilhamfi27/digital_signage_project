<?php
class Account extends MY_Controller{
    public function __construct() {
        parent::__construct();
        parent::session_needed_except();
        $this->load->model('user_model', 'user_m');
    }

    public function setting(){
        $data['page_resource'] = parent::page_resources();
        $data['auth_setting'] = $this->user_m->detail($this->session->id)->row();
        $this->load->view('account/setting', $data);
    }

    public function update_account_data(){
        $email                 = $this->input->post('email');
        $password              = $this->input->post('password');
        $password_confirmation = $this->input->post('password_confirmation');
        $password_verification = $this->input->post('password_verification');
        
    }

}

