<?php 

class Payment_method_new extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('dataModel_new');
		$this->load->helper('url');
	}
	function index()
	{
		$dataArray['package'] = $this->dataModel_new->tampilPayment()->result();
		// print_r($this->dataModel->tampilPayment()->result());
		$this->load->view('billing/tampilkan_data', $dataArray);
	}
	function create()
	{
		$this->load->view('billing/input_data_new');
	}
	function aksiCreate()
	{
		
		$name = $this->input->post('name');
		$price = $this->input->post('price');

		$dataArray = array('name' => $name,
						'price'=> $price
					);
		$this->dataModel_new->input_data_payment($dataArray,'package');
		redirect('payment_method_new/index');

	}
	
	function update($id){
		$where = array('id' => $id);
		$dataArray['payment'] = $this->dataModel->edit_data($where,'payment')->result();
		$this->load->view('edit',$dataArray);
	}
	function aksiUpdate(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$metode = $this->input->post('metode');
		$pilih_paket_premium = $this->input->post('pilih_paket_premium');
		$harga = $this->input->post('harga');
		
		$dataArray = array('id' => $id,
						'nama' => $nama,
						'metode' => $metode,
						'pilih_paket_premium'=> $pilih_paket_premium,
						'harga'=> $harga
					);
	 
		$where = array(
			'id' => $id
		);
	 
		$this->dataModel->update_data($where,$dataArray,'payment');
		redirect('billing/index');
	}
	function deleteData($id){
		$where = array('id' => $id);
		$this->dataModel->hapus($where,'payment');
		redirect('billing/index');
	}
}


 ?>