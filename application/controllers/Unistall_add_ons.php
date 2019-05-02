<?php 

/**
 * 
 */
class Unistall_add_ons extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_unistall_add_ons');
		$this->load->helper('url');
	}
	public function index(){
	$this->load->view('billing/delete_add_ons');
	}
	public function delete()
	{
		$data['plugins'] = $this->m_unistall_add_ons->hapus();
		redirect('unistall_add_ons/index');
	}
}

 ?>