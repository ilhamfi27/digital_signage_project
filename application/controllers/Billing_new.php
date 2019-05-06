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
	function create($id_plugin = NULL){
		$data['page_resource'] = parent::page_resources();
		$data['package'] = $this->dataModel_new->tampilPayment()->result();
		$data['id_plugin'] = $id_plugin;
		$this->load->view('billing/inputkan_new', $data);
	}
	function aksiCreate(){
		$data['page_resource'] = parent::page_resources();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$duration_first = $this->input->post('duration_first');
		$duration_last = $this->input->post('package') == 'thn' ? date_format(date_add(date_create($duration_first),date_interval_create_from_date_string("1 years")), "Y-m-d") : ($this->input->post('package') == 'bln' ? date_format(date_add(date_create($duration_first),date_interval_create_from_date_string("1 months")), "Y-m-d") : date_format(date_add(date_create($duration_first),date_interval_create_from_date_string("1 days")), "Y-m-d"));
		$method = $this->input->post('method');
		$package_method = $this->input->post('package_method');

		$dataArray = array('name' => $name,
							'email' => $email,
							'duration_first' => $duration_first,
							'duration_last' => $duration_last,
						'id_package'=> $package_method,
						'user_id' => $this->session->userdata('id'),
						'status' => 2,
						'status_install' => 1
					);

		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Exmail','trim|required');
		$this->form_validation->set_rules('duration_first','Duration_first','trim|required');
		// $this->form_validation->set_rules('duration_last','Duration_last','trim|required');
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
		    $this->email->message("Kode anda adalah : $encrypted_id");

		    if ($this->email->send()) {
		    	$total_harga = $this->db->get_where('add_ons', ['id_plugin' => $this->input->post('package_method')])->row()->price;
		    	$this->dataModel_new->input_data($dataArray);
		        $dataTransaksi= array('method' => $method,
							'id_billing' => $this->db->insert_id(),
							'date' => date('d-m-Y'),
							'kode' => $encrypted_id,
							'jumlah' => $this->input->post('package') == 'thn' ? $total_harga * 300 : ($this->input->post('package') == 'bln' ? $total_harga * 25 : $total_harga)
						);
		        $this->dataModel_new->input_data_transaksi($dataTransaksi);
				redirect('payment_verif_new/createVerif');
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
		$duration_first = $this->input->post('duration_last');
		$duration_last = $this->input->post('package') == 'thn' ? date_format(date_add(date_create($duration_first),date_interval_create_from_date_string("1 years")), "Y-m-d") : ($this->input->post('package') == 'bln' ? date_format(date_add(date_create($duration_first),date_interval_create_from_date_string("1 months")), "Y-m-d") : date_format(date_add(date_create($duration_first),date_interval_create_from_date_string("1 days")), "Y-m-d"));
		$method = $this->input->post('method');
		$package_method = $this->input->post('package_method');

		$dataArray = array('name' => $name,
						'email' => $email,
						'duration_last' => $duration_last,
						'duration_first' => $this->input->post('duration_first'),
						'id_package'=> $package_method,
						'user_id' => $this->session->userdata('id'),
						'status' => 2,
						'status_install' => $this->input->post('status_install')
					);

		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Exmail','trim|required');
		// $this->form_validation->set_rules('duration_first','Duration_first','trim|required');
		// $this->form_validation->set_rules('duration_last','Duration_last','trim|required');
		$this->form_validation->set_rules('package_method','Method','trim|required');
		if ($this->form_validation->run() === FALSE) {
			$this->update($this->input->post('id_billing'));

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
		    $this->email->message("Kode anda adalah : $encrypted_id");

		    if ($this->email->send()) {
		    	$total_harga = $this->db->get_where('add_ons', ['id_plugin' => $this->input->post('package_method')])->row()->price;
		    	$this->db->set($dataArray)->where('id_billing', $this->input->post('id_billing'))->update('billing');
		        $dataTransaksi= array('method' => $method,
							'id_billing' => $this->input->post('id_billing'),
							'date' => date('d-m-Y'),
							'kode' => $encrypted_id,
							'jumlah' => $this->input->post('package') == 'thn' ? $total_harga * 300 : ($this->input->post('package') == 'bln' ? $total_harga * 25 : $total_harga)
						);
		        $this->dataModel_new->input_data_transaksi($dataTransaksi);
				redirect('payment_verif_new/createVerif');
		    } else {
		    	echo "terjadi kesalahan";
		    }
        }
	}
	// public function delete_data($id){
	// 	$where = array('id_billing' => $id);
	// 	$this->dataModel_new->hapus($where,'billing');
	// 	redirect('billing_new/create');
	// }
	public function view_admin()
	{
		$data['page_resource'] = parent::page_resources();
			$data['billing'] = $this->dataModel_new->tampil_admin()->result();
			$this->load->view('billing/viewAdmin', $data);}

	}


 ?>