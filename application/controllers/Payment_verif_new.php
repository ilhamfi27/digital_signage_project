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
		$kode = $this->input->post('kode');

		$this->form_validation->set_rules('kode','Kode','trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->createVerif();
        } else {
	        $cek_kode = $this->db->get_where('transaction', ['kode' => $kode]);
	        if ($cek_kode->num_rows() > 0) {
	        	$this->m_payment_new->update_status($cek_kode->row(1)->id_billing);
	        	redirect('payment_verif_new/index');
	        } else {
	        	$this->session->set_flashdata('info', 'Kode verifikasi salah.');
	        	redirect('payment_verif_new/createVerif');
	        }
        }

		

	}
	public function cetak($id)
	{
		$dataArray['page_resource'] = parent::page_resources();
		$dataArray['billing'] = $this->m_payment_new->tampilBilling($id)->row(1);
		$this->load->view('billing/cetakPayment',$dataArray);
	}
}