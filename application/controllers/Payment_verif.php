<?php 

class Payment_verif extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_payment');
		$this->load->helper('url');
	}
	function index()
	{
		$dataArray['detail_payment'] = $this->m_payment->tampil()->result();
		$this->load->view('billing/v_tampil', $dataArray);
	}
	function createVerif()
	{
		$this->load->view('billing/v_verif');
	}
	function aksiCreateVerif()
	{
		$kode = $this->input->post('kode');

		$dataArray = array('kode' => $kode);
		$this->form_validation->set_rules('kode','Kode','trim|required');

		if ($this->form_validation->run() === FALSE) {
		$this->load->view('billing/v_verif');

        } else {
	        $this->m_payment->input_data($dataArray,'payment');
			redirect('payment_verif/index');

        }

		

	}
}