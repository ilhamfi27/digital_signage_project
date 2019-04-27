<?php 

class Billing_new extends MY_Controller
{
	
	function __construct(){
		parent:: __construct();
		$this->load->model('dataModel_new');
		$this->load->library('email');
		$this->load->helper('url');
	}
	function index(){
		$data['page_resource'] = parent::page_resources();
		$this->load->view('billing/v_verif_new', $data);
		redirect('payment_verif_new/createVerif',$data);
	}
	function create(){
		$data['page_resource'] = parent::page_resources();
		$data['package'] = $this->dataModel_new->tampilPayment()->result();
		$this->load->view('billing/inputkan_new', $data);
	}
	function aksiCreate(){
		$data['page_resource'] = parent::page_resources();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$duration_first = $this->input->post('duration_first');
		$duration_last = $this->input->post('duration_last');
		$method = $this->input->post('method');
		$package_method = $this->input->post('package_method');

		$dataArray = array('name' => $name,
							'email' => $email,
							'duration_first' => $duration_first,
							'duration_last' => $duration_last,
							
						'id_package'=> $package_method,
						'user_id' => $this->session->userdata('id'),
					);
		
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Exmail','trim|required');
		$this->form_validation->set_rules('duration_first','Duration_first','trim|required');
		$this->form_validation->set_rules('duration_last','Duration_last','trim|required');
		$this->form_validation->set_rules('method','Method','trim|required');
		if ($this->form_validation->run() === FALSE) {
			$data['page_resource'] = parent::page_resources();
			$data['package'] = $this->dataModel_new->tampilPayment()->result();
			$this->load->view('billing/inputkan_new', $data);

        } else {
        	$encrypted_id = mt_rand(100000, 999999);
        	$this->load->library('email');

        	$config['charset'] = 'utf-8';
		    $config['useragent'] = 'Codeigniter';
		    $config['protocol']= "smtp";
		    $config['mailtype']= "html";
		    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		    $config['smtp_port']= "465";
		    $config['smtp_timeout']= "7";
		    $config['smtp_user']= "pangestuade123@gmail.com"; // isi dengan email kamu
		    $config['smtp_pass']= "adepangestu11"; // isi dengan password kamu
		    $config['crlf']="\r\n"; 
		    $config['newline']="\r\n"; 
		    $config['wordwrap'] = TRUE;

		    $this->email->initialize($config);
		    //konfigurasi pengiriman
		    $this->email->from($config['smtp_user']);
		    $this->email->to($email);
		    $this->email->subject("Kode Pembayaran");
		    $this->email->message("Ini dia kode anda $encrypted_id");

		    if ($this->email->send()) {
		    	$this->dataModel_new->input_data($dataArray);
		        $dataTransaksi= array('method' => $method,
							'id_billing' => $this->db->insert_id(),
							'date' => date('d-m-Y'),
							'kode' => $encrypted_id);
		        $this->dataModel_new->input_data_transaksi($dataTransaksi);
				redirect('billing_new/index');
		    } else {
		    	echo "terjadi kesalahan";
		    }
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
		$email = $this->input->post('email');
		$duration_first = $this->input->post('duration_first');
		$duration_last = $this->input->post('duration_last');
		$method = $this->input->post('method');
		$package_method = $this->input->post('package_method');

		$dataArray = array('name' => $name,
							'email' => $email,
							'duration_first' => $duration_first,
							'duration_last' => $duration_last,
							
						'id_package'=> $package_method,
						'user_id' => $this->session->userdata('id'),
					);
		
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('duration_first','Duration_first','trim|required');
		$this->form_validation->set_rules('duration_last','Duration_last','trim|required');
		$this->form_validation->set_rules('method','Method','trim|required');
		if ($this->form_validation->run() === FALSE) {
			$this->update($this->session->userdata('id'));
        } else {
        	$encrypted_id = mt_rand(100000, 999999);
        	$this->load->library('email');

        	$config['charset'] = 'utf-8';
		    $config['useragent'] = 'Codeigniter';
		    $config['protocol']= "smtp";
		    $config['mailtype']= "html";
		    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		    $config['smtp_port']= "465";
		    $config['smtp_timeout']= "400";
		    $config['smtp_user']= "pangestuade123@gmail.com"; // isi dengan email kamu
		    $config['smtp_pass']= "adepangestu123"; // isi dengan password kamu
		    $config['crlf']="\r\n"; 
		    $config['newline']="\r\n"; 
		    $config['wordwrap'] = TRUE;

		    $this->email->initialize($config);
		    //konfigurasi pengiriman
		    $this->email->from($config['smtp_user']);
		    $this->email->to($email);
		    $this->email->subject("Kode Pembayaran");
		    $this->email->message("Ini dia kode anda $encrypted_id");

		    if ($this->email->send()) {
		    	$dataArray = $this->input->post();
	        	$dataArray['date'] = date('d-m-Y');
	        	$dataArray['kode'] = $encrypted_id;
		        $this->dataModel_new->update_billing($dataArray, $this->session->userdata('id'));
				redirect('billing_new/index');
		    } else {
		    	echo "terjadi kesalahan";
		    }
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