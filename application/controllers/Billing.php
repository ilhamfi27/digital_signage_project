<?php 

class Billing extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('dataModel');
		$this->load->helper('url');
	}
	function index()
	{
		$dataArray['payment'] = $this->dataModel->tampil()->result();
		
		redirect('payment_verif/createVerif');
	}
	function create()
	{
		$data['metode'] = $this->dataModel->tampilPayment()->result();
		$this->load->view('billing/inputkan', $data);
	}
	function aksiCreate()
	{
		$nama = $this->input->post('nama');
		$metode_pembayaran = $this->input->post('metode_pembayaran');

		$dataArray = array('nama' => $nama,
						'metode_pembayaran'=> $metode_pembayaran
					);
		$this->form_validation->set_rules('nama','Nama','trim|required');

		if ($this->form_validation->run() === FALSE) {
		$data['metode'] = $this->dataModel->tampilPayment()->result();
		$this->load->view('billing/inputkan', $data);

        } else {
	        $this->dataModel->input_data($dataArray,'payment');
			redirect('billing/index');
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