<?php 

/**
 * 
 */
class Add_ons extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	public function index()	{
		$this->load->view('add_ons/index');
	}
	public function content(){
		# code...
	}
}