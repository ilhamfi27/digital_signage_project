<?php
/**
 * 
 * 
 */
class Register extends MY_Controller{
    private $activation_code;
    public function __construct(){
        parent::__construct();
        // $this->load->library('email_handler');
        $this->load->model('user_model', 'user_m');
        $this->load->model('user_data_model', 'user_data_m');
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
                'rules' => 'trim|required|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z0-9_.@]+$/]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]|max_length[30]'
            ],
            [
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'trim|required|min_length[6]|max_length[30]|matches[password]'
            ]
        ]);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/register/index');
        } else {
            // $this->activation_code = $this->random_activation_code();
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => md5($password)//,
                // 'verification_code' => $this->activation_code,
                // 'verification_sent_date' => parent::local_timestamp()
            ];
            $user_id = $this->user_m->insert($data);
            $this->user_data_m->insert(['user_id' => $user_id]);
            redirect("auth/login/");
        }
    }

    protected function send_verification_email($email, $id) {
        $config = parent::email_config();
        $this->email_handler->initialize($config);
        $this->email_handler->from($config['smtp_user']);
        $this->email_handler->to($email);
        $this->email_handler->subject('Signup Verification Email');
        $message = 	"
        <html>
        <head>
            <title>Verification Code</title>
        </head>
        <body>
            <h2>Thank you for Registering.</h2>
            <p>Your Account:</p>
            <p>Email: ".$email."</p>
            <p>Password: You Inserted</p>
            <p>Please click the link below to activate your account.</p>
            <h4><a href='".base_url()."auth/activate/".$id."/".$this->activation_code."'>Activate My Account</a></h4>
        </body>
        </html>
        ";
        $this->email_handler->message($message);
        return $this->email_handler->send();
    }

    private function random_activation_code($length = 64) {
        $set =  '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.
        '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.
        '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($set), 0, $length);
    }
}
