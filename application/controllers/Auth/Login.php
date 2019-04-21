<?php
/**
 * 
 * 
 */
class Login extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model', 'user');
        parent::session_needed_except('test_aja|index|create_session');
    }

    public function index(){
        $this->has_session();
        $this->load->view('auth/login/index');
    }
    
    public function create_session(){
        $user_auth = $this->input->post('user_auth');
        $password = $this->input->post('password');

        $this->form_validation->set_rules([
            [
                'field' => 'user_auth',
                'label' => 'Username or Email',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login/index');
        } else {
            $data = [
                'user_auth' => $user_auth,
                'password' => md5($password)
            ];
            $this->detailed_check($data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("auth/login/");
    }

    private function has_session() {
        if ($this->session->status) {
            redirect('dashboard/');
        }
    }

    public function detailed_check($data) {
        $user = $this->user->user_existence($data);
        $user_data = $user->row();
        if($user_data->username === $data['user_auth'] || $user_data->email === $data['user_auth']){
            if ($user_data->password === $data['password']) {
            $this->session->set_userdata(
                [
                    'id'        => $user_data->user_id,
                    'level'     => $user_data->level,
                    'status'    => 'logged in'
                    ]
                );
                redirect('dashboard/','refresh');
            } else {
                $this->session->set_flashdata('login_failure_message','Incorrect Password');
                $this->load->view('auth/login/index');
            } 
        } else {
            $this->session->set_flashdata('login_failure_message', 'Account Not Registered, Please Register For Login');
            redirect('auth/login/');
        }
    }
}
