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
        $data['page_resource'] = parent::page_resources();
        $data['auth_setting'] = $this->user_m->detail($this->session->id)->row();

        $username                   = $this->input->post('username');
        $email                      = $this->input->post('email');
        $new_password               = $this->input->post('new_password');
        $new_password_confirmation  = $this->input->post('new_password_confirmation');
        $password_verification      = $this->input->post('password_verification');
        
        $this->form_validation->set_rules([
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[30]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|min_length[3]|max_length[30]|valid_email'
            ],
            [
                'field' => 'new_password',
                'label' => 'New Password',
                'rules' => 'trim|min_length[6]|max_length[30]'
            ],
            [
                'field' => 'new_password_confirmation',
                'label' => 'New Password Confirmation',
                'rules' => 'trim|min_length[6]|max_length[30]|matches[new_password]'
            ],
            [
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'trim|min_length[6]|max_length[30]'
            ]
        ]);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('account/setting', $data);
        } else {
            $user_encrypted_password = $this->user_m->detail($this->session->userdata('id'))->row()->password;
            if (md5($password_verification) !== $user_encrypted_password) {
                // echo "input ".md5($password_verification);
                // echo "<br>";
                // echo "db ".$user_encrypted_password;
                $this->session->set_flashdata('wrong_password_verification', 'Wrong password verification');
                redirect('account/setting');
            } else {
                $new_user_base_data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => "" !== $new_password ? md5($new_password) : $user_encrypted_password,
                ];
                $is_update = $this->user_m->update($new_user_base_data, $this->session->userdata('id'));
                if($is_update > 0){
                    $this->session->set_flashdata('update_status', 'User Base Data Updated!');
                    redirect('account/setting');
                } else {
                    $this->session->set_flashdata('update_status', 'User Base Data Updated!');
                    redirect('account/setting');
                }
            }
        }
    }
}
