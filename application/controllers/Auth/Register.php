<?php
/**
 * 
 * 
 */
class Register extends Application_controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('auth/register/index');
    }

}
