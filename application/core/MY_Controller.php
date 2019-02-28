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
}
