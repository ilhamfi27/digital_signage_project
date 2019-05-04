<?php 

/**
 * 
 */
class Uninstall_add_ons extends MY_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Add_on_model_new');
		$this->load->helper('url');
	}

	public function index(){
		$data['page_resource'] = parent::page_resources();
		$data['addon'] = $this->Add_on_model_new->all()->result();
		$this->load->view('billing/delete_add_ons', $data);
	}

	public function delete($id){	
		$data['plugins'] = $this->m_unistall_add_ons->hapus();
		$this->dataModel->hapus($id,'plugins');
		redirect('unistall_add_ons/index');
	}
}

 ?>