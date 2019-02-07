<?php 
	class Billing extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			
		}
		public function index(){
			$this->load->view('billing/index');
		}
		public function create()
		{
			$firstName 		= $this->input->post('firstName');
			$lastName 		= $this->input->post('lastName');
			$phoneNumber 	= $this->input->post('phoneNumber');
			$email 			= $this->input->post('email');
			$company 		= $this->input->post('company');

			
		}
		public function payment()
		{
			$this->load->view('payment');
		}
	}

 ?>