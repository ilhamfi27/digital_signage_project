<?php
class Account extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function setting(){
        $this->load->view('account/setting');
    }
}

