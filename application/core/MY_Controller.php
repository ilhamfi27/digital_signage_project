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
}
