<?php 

class Billing_new extends MY_Controller
{
	
	function __construct(){
		parent:: __construct();
		$this->load->model('dataModel_new');
		$this->load->helper('url');
	}
	function index(){
		// $dataArray['payment_code'] = $this->dataModel->tampil()->result();
		// $data['page_resource'] = parent::page_resources();
		$this->load->view('billing/v_verif_new', $data);
		// redirect('payment_verif_new/createVerif',$data);
	}
	function create(){
		$data['page_resource'] = parent::page_resources();
		$data['package'] = $this->dataModel_new->tampilPayment()->result();
		$this->load->view('billing/inputkan_new', $data);
	}
	function aksiCreate(){
		// $data['page_resource'] = parent::page_resources();
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
							
						'id_package'=> $package_method,
						'user_id' => $this->session->userdata('id'),
					);
		
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('phone_number','Phone_number','trim|required');
		$this->form_validation->set_rules('duration_first','Duration_first','trim|required');
		$this->form_validation->set_rules('duration_last','Duration_last','trim|required');
		$this->form_validation->set_rules('method','Method','trim|required');
		if ($this->form_validation->run() === FALSE) {
		$data['transaction'] = $this->dataModel_new->tampilPayment()->result();
		$this->load->view('billing_new/inputkan_new', $data);

        } else {
	        $this->dataModel_new->input_data($dataArray);
	        $dataTransaksi= array('method' => $method,
						'id_billing' => $this->db->insert_id(),
						'date' => date('d-m-Y'));
	        $this->dataModel_new->input_data_transaksi($dataTransaksi);
			redirect('billing_new/index');
        }

    }

	function update($id){
		$where = array('id_billing' => $id);
		$dataArray['page_resource'] = parent::page_resources();
		$dataArray['billing'] = $this->dataModel_new->edit_billing($where,'billing')->row(1);
		$dataArray['package'] = $this->dataModel_new->tampilPayment()->result();
		$this->load->view('billing/edit_pembayaran',$dataArray);
	}
	function update_billing(){
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
							
						'id_package'=> $package_method,
						'user_id' => $this->session->userdata('id'),
					);
		
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('phone_number','Phone_number','trim|required');
		$this->form_validation->set_rules('duration_first','Duration_first','trim|required');
		$this->form_validation->set_rules('duration_last','Duration_last','trim|required');
		$this->form_validation->set_rules('method','Method','trim|required');
		if ($this->form_validation->run() === FALSE) {
			$this->update($this->session->userdata('id'));
        } else {
        	$dataArray = $this->input->post();
        	$dataArray['date'] = date('d-m-Y');
	        $this->dataModel_new->update_billing($dataArray, $this->session->userdata('id'));
			redirect('billing_new/index');
        }
	}
	function deleteData($id){
		// $where = array('id' => $id);
		$this->dataModel->hapus($id,'payment');
		redirect('billing/index');
	}
public function view_admin()
{
	$data['page_resource'] = parent::page_resources();
		$data['billing'] = $this->dataModel_new->tampil_admin()->result();
		$this->load->view('billing/viewAdmin', $data);}

}


 ?>