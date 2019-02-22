<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application_controller {
	public function index(){
		$this->load->view('welcome');
	}
}
