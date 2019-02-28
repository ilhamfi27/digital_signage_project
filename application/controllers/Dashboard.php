<?php
class Dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        parent::session_needed_except();
        $this->load->helper('view_partial');
    }

    public function index(){
        $this->load->view('dashboard/index');
    }

    public function user_profile(){
        $this->load->view('dashboard/user_profile');
    }

    public function insert_data_user() {
        $username = $this->input->post('username');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $birth_date = $this->input->post('birth_date');
        $email = $this->input->post('email');

        $this->form_validation->set_rules([
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'birth_date',
                'label' => 'Birth Date',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim'
            ]
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('dashboard/user_profile');
        } else {
            redirect('dashboard/user_profile');
        }
        
    }

    
}
