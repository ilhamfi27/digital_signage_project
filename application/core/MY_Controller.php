<?php
class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    protected function session_needed_except($methods = []) {
        $method_used = $this->router->fetch_method();
        if (!$this->session->status && !in_array($method_used, $methods)) {
            redirect('auth/login/', 'refresh');
        }
    }

    protected function email_config(){
        return [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'digitalsignage.lab.si@smtp.gmail.com',
            'smtp_pass' => 'sinergibangunnegeri',
            'smtp_port' => '465',
            'smtp_crypto' => 'ssl',
            'charset'   => 'iso-8859-1',
            'mailtype' => 'html',
            'newline' => '\r\n'
        ];
    }

    protected function local_timestamp(){
        date_default_timezone_set("Asia/Jakarta");
        return date('Y-m-d h:i:s');
    }

    protected function page_resources($add_data = NULL){
        $this->load->model("user_model", "user_m");
        $data['user_data'] = $this->user_data_m->detail($this->session->id)->row();
        $data['app_data'] = $add_data;
        return [
            'meta' => $this->load->view('resources/_meta', NULL, TRUE),
            'admin_header' => $this->load->view('resources/_admin_header', $data, TRUE),
            'admin_sidebar' => $this->load->view('resources/_admin_sidebar', $data, TRUE),
            'admin_footer' => $this->load->view('resources/_admin_footer', $data, TRUE),
            'admin_scripts' => $this->load->view('resources/_admin_scripts', NULL, TRUE)
        ];
    }
}
