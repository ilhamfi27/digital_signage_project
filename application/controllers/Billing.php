<?php 
	class Billing extends MY_Controller{
		
		function __construct(){
			parent::__construct();
			parent::session_needed_except();
			
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
			$data['firstName'] = $firstName;
			$data['lastName'] = $lastName;
			$data['phoneNumber'] = $phoneNumber;
			$data['email'] = $email;
			$data['company'] = $company;
			$this->load->view('billing/payment',$data);
			
		}
		public function payment()
		{
			$this->load->view('payment');
		}
	}

 ?>