<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    protected function skip_session($methods = []){
        $method_used = $this->router->fetch_method();
        if ($this->session->userdata('user') && !in_array($methods,$method_used)) {
            redirect("auth/login/", "refresh");
        }
    }
}
