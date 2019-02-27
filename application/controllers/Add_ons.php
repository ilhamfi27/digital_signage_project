<?php 

/**
 * 
 */
class Add_ons extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('view_partial');
	}
	public function index()	{
		$this->load->view('add_ons/index');
	}
	public function details($id){
		$data['id'] = $id;
		$this->load->view('add_ons/details', $data);
	}
}