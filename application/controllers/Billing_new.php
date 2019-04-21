<?php 

class Billing_new extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('dataModel_new');
		$this->load->helper('url');
	}
	function index()
	{
		// $dataArray['payment_code'] = $this->dataModel->tampil()->result();
		
		redirect('payment_verif_new/createVerif');
	}
	function create()
	{
		$data['page_resource'] = parent::page_resources();
		$data['package'] = $this->dataModel_new->tampilPayment()->result();
		$this->load->view('billing/inputkan_new', $data);
	}
	function aksiCreate()
	{
		$name = $this->input->post('name');
		$phone_number = $this->input->post('phone_number');
		$duration_first = $this->input->post('duration_first');
		$duration_last = $this->input->post('duration_last');
		$method = $this->input->post('method');
		$package_method = $this->input->post('package_method');

		$dataArray = array('name' => $name,
							'phone_number' => $phone_number,
							'duration_first' => $duration_first,
							'duration_last' => $duration_last,
							'method' => $method,
						'package_method'=> $package_method
					);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('phone_number','Phone_number','trim|required');
		$this->form_validation->set_rules('duration_first','Duration_first','trim|required');
		$this->form_validation->set_rules('duration_last','Duration_last','trim|required');
		$this->form_validation->set_rules('method','Method','trim|required');
		if ($this->form_validation->run() === FALSE) {
		$data['transaction'] = $this->dataModel->tampilPayment()->result();
		$this->load->view('billing_new/inputkan_new', $data);

        } else {
	        $this->dataModel_new->input_data($dataArray,'transaction');
			redirect('billing_new/index');
        }

    }

	function update($id){
		$where = array('id' => $id);
		$dataArray['metode'] = $this->dataModel->edit_data($where,'metode')->result();
		$this->load->view('edit_pembayaran',$dataArray);
	}
	function aksiUpdate(){
		$nama = $this->input->post('nama');
		$metode_pembayaran = $this->input->post('metode_pembayaran');

		$dataArray = array('nama' => $nama,
						'metode_pembayaran'=> $metode_pembayaran
					);
	 
		$where = array(
			'id' => $id
		);
	 
		$this->dataModel->update_data($where,$dataArray,'metode');
		redirect('billing/index');
	}
	function deleteData($id){
		// $where = array('id' => $id);
		$this->dataModel->hapus($id,'payment');
		redirect('billing/index');
	}


}


 ?>