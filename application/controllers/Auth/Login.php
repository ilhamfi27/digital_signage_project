<?php
/**
 * 
 * 
 */
class Login extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('view_partial');
        $this->load->model('user_model', 'user');
    }

    public function index(){
        $this->load->view('auth/login/index');
    }
    
    public function create_session(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules([
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z0-9_.]+$/]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[3]|max_length[40]'
            ]
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login/index');
        } else {
            $data = [
                'username' => $username,
                'password' => md5($password)
            ];
            $user = $this->user->user_existence($data);
            $user_num = $user->num_rows();
            $user_data = $user->row();
            if ($user_num > 0) {
                $this->session->set_userdata(
                    [
                        'username' => $username,
                        'email' => $user_data->email,
                        'level' => 'admin'
                    ]
                );
                redirect('dashboard/','refresh');
            } else {
                $this->load->view('auth/login/index');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("auth/login/");
    }
}
