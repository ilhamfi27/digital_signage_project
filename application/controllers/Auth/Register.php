<?php
/**
 * 
 * 
 */
class Register extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('auth/register/index');
    }

}
