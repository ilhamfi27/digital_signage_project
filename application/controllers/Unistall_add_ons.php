<?php 

/**
 * 
 */
class Unistall_add_ons extends MY_Controller
{
	
	function __construct()
	{

		$data['page_resource'] = parent::page_resources();
		parent:: __construct();
		$this->load->model('m_unistall_add_ons');
		$this->load->helper('url');
	}
	public function index(){

		$data['page_resource'] = parent::page_resources();
	$this->load->view('billing/delete_add_ons');
	}
	public function delete($id){	
		$data['plugins'] = $this->m_unistall_add_ons->hapus();
		$this->dataModel->hapus($id,'plugins');
		redirect('unistall_add_ons/index');
	}
}

 ?>