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
		$this->load->model('m_unistall_add_ons');
		$this->load->model('m_payment_new');
		$this->load->helper('url');
	}

	public function index(){
		$data['page_resource'] = parent::page_resources();
		$data['addon'] = $this->m_unistall_add_ons->tampil()->result();
		$data['billing'] = $this->m_payment_new->tampilBilling($this->session->id)->row();
		$this->load->view('billing/delete_add_ons', $data);
	}

	public function delete($id){	
		$data['plugins'] = $this->m_unistall_add_ons->hapus();
		$this->dataModel->hapus($id,'plugins');
		redirect('unistall_add_ons/index');
	}

	public function uninstall($id)
	{
		$this->db->set(['status_install' => 2]);
		$this->db->where('id_billing', $id);
		$this->db->update('billing');
		redirect('Uninstall_add_ons/index');
	}

	public function install($id)
	{
		$this->db->set(['status_install' => 1]);
		$this->db->where('id_billing', $id);
		$this->db->update('billing');
		redirect('Uninstall_add_ons/index');
	}
}

 ?>