<?php 

class Payment_verif_new extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_payment_new');
		$this->load->helper('url');
	}
	function index()
	{
		$dataArray['page_resource'] = parent::page_resources();
		$dataArray['payment_code'] = $this->m_payment_new->tampil()->result();
		$dataArray['billing'] = $this->m_payment_new->tampilBilling($this->session->userdata('id'))->row(1);
		$this->load->view('billing/v_tampil_new', $dataArray);
	}
	function createVerif()
	{
		$data['page_resource'] = parent::page_resources();
		$this->load->view('billing/v_verif_new', $data);
	}
	function aksiCreateVerif()
	{
		$code = $this->input->post('code');

		$dataArray = array('code' => $code);
		$this->form_validation->set_rules('code','Kode','trim|required');

		if ($this->form_validation->run() === FALSE) {
		$this->load->view('billing/v_verif_new');

        } else {
	        $this->m_payment_new->input_data($dataArray,'payment_code');
			redirect('payment_verif_new/index');

        }

		

	}
	public function cetak($id)
	{
		$dataArray['page_resource'] = parent::page_resources();
		$dataArray['billing'] = $this->m_payment_new->tampilBilling($id)->row(1);
		$this->load->view('billing/cetakPayment',$dataArray);
	}
}