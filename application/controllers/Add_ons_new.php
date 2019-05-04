<?php 
class Add_ons_new extends MY_Controller{
	
	function __construct(){
		parent::__construct();
        parent::session_needed_except();
		$this->load->helper('view_partial');
		$this->load->model('Add_on_model_new');
		$this->load->model('Add_on_creator_model_new');
		$this->load->model('creator_model','creator_m');
		$this->load->model('plugin_model','plugin_m');
        $this->load->model("comment_model", "comment_m");
		$config['upload_path'] = 'storage/images/add_ons/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload',$config);
	}

	public function index()	{
        $data['page_resource'] = parent::page_resources();
		$data['addon'] = $this->Add_on_model_new->all()->result();
		$this->load->view('add_ons/index_new',$data);
	}
	
	public function details($id){
        $data['page_resource'] = parent::page_resources();
        $data['plugins']= $this->Add_on_model_new->details($id)->row(1);
        $data['id_plugin'] = $id;
        $data['comment'] = $this->comment_m->object_comments($id);
		$this->load->view('add_ons/details_new', $data);
	}
	public function details_creator($id){
        $data['page_resource'] = parent::page_resources();
        $data['creator'] = $this->Add_on_creator_model_new->details($id)->row(1);
		$this->load->view('add_ons/detail_creator_new', $data);
	}
	// public function new_addon(){
 //        $data['page_resource'] = parent::page_resources();
	// // public function insert_add_on(){

 // //        $data['page_resource'] = parent::page_resources();
	// // 	$price 		= $this->input->post('price');

	// // 	$this->form_validation->set_rules([
	// // 		[
	// // 			'field' => 'price',
	// // 			'label'	=> 'Price',
	// // 			'rules' => 'required'
	// // 		]
	// // 	]);

	// 	if ($this->form_validation->run() === FALSE) {
	// 		$this->load->view('add_ons/new_addon_new',$data);
	// 	} else{
	// 			$data = [
	// 				'price' => $price
	// 			];
	// 			$this->add_on_model_new->insert_add_on($data);
	// 			redirect('add_ons_new/list_addon');
	// 		}
	// 	}

	public function new_addon(){

        $data['page_resource'] = parent::page_resources();
		$this->form_validation->set_rules([
			[
				'field' => 'plugins[description]',
				'label'	=> 'Description',
				'rules' => 'required|min_length[10]'
			],
			[
				'field' => 'plugins[title]',
				'label'	=> 'Title',
				'rules' => 'required'
			],
			[
				'field' => 'add_ons[price]',
				'label'	=> 'price',
				'rules' => 'required'
			]
		]);

		if ($this->form_validation->run() === FALSE) {
			$data['creator'] = $this->creator_m->specific_data(['made' => "a"])->result();
			$this->load->view('add_ons/new_addon_new',$data);
		} else {
			if (!$this->upload->do_upload('uploaded')){
				echo $this->upload->display_errors();
			}else{
				$data_plugins = $this->input->post('plugins');
				$data_addon = $this->input->post('add_ons');
				$data_plugins['photo_icon'] = $this->upload->data('file_name');
				$data_plugins['rating'] = 0.0;
				$data_plugins['uploaded_date'] = parent::local_timestamp();
				print_r($data_plugins);
				$result = $this->plugin_m->insert($data_plugins);
				$data_addon['id_plugin'] = $this->db->insert_id();
				$this->Add_on_model_new->insert_add_on($data_addon);
				redirect('add_ons_new/list_plugin');
			}
		}
	}

	public function delete_plugin($data){
		$where = array('id_plugin'=>$data);
		$this->Add_on_model_new->delete_plugin($where);
		redirect('add_ons_new/list_plugin');
	}
	public function edit_plugin($id){
        $data['page_resource'] = parent::page_resources();
		$where = array('id'=>$id);
		$data['creator'] = $this->creator_m->specific_data(['made' => "a"])->result();
		$data['plugins'] = $this->Add_on_model_new->all($id)->row(1);
		// $data['addon']=$this->Add_on_model_new->details($where)->row();
		$this->load->view('add_ons/edit_addon_new',$data);
	}
	public function update_add_on(){
        $data['page_resource'] = parent::page_resources();
		$id_plugin = $this->input->post('id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$creator = $this->input->post('id_creator');
		
		$this->form_validation->set_rules([
			[
				'field' => 'description',
				'label'	=> 'Description',
				'rules' => 'required|min_length[10]'
			],
			[
				'field' => 'title',
				'label'	=> 'Title',
				'rules' => 'required'
			],
			[
				'field' => 'price',
				'label'	=> 'price',
				'rules' => 'required'
			]
		]);

		if ($this->form_validation->run() === FALSE) {
			$data['creator'] = $this->creator_m->specific_data(['made' => "a"])->result();
			$this->load->view('add_ons/edit_addon_new',$data);
		} else {
			$plugin = $result = $this->plugin_m->details($id_plugin)->row();
			if (!$this->upload->do_upload('uploaded') && $plugin->photo_icon == ""){
				echo $this->upload->display_errors();
			}else{
				$data_plugin = array(
					'photo_icon'=> $this->upload->data('file_name') !== "" ? $this->upload->data('file_name') : $plugin->photo_icon,
					'title'=>$title,
					'description'=>$description,
					'uploaded_date'=>$plugin->uploaded_date,
					'updated_date'=>parent::local_timestamp(),
					'id_creator'=>$creator
				);
				$data_add_on = array(
					'price'=>$price
				);
				$result = $this->plugin_m->update($data_plugin, $id_plugin);
				$this->Add_on_model_new->update($data_add_on, $id_plugin);
				redirect('add_ons_new/list_plugin');
			}
		}
		$this->Add_on_model_new->update($data,$id_plugin);
		redirect('add_ons_new/list_plugin');

	}
	public function install_addon()	{
		$user_id = $this->session->userdata("id");
		$status = $this->Add_on_model_new->available($user_id)->row()->status;
		$status == 1 ? $data['add_ons'] = $this->Add_on_model_new->all()->result() : $data['add_ons'] = NULL;
        $data['page_resource'] = parent::page_resources();
		$this->load->view('add_ons/install_addon_new',$data);
	}
	public function new_creator(){
        $data['page_resource'] = parent::page_resources();
		$this->load->view('add_ons/newCreator_new',$data);
	}
	public function insert_creator(){
		$data['page_resource'] = parent::page_resources();
		$name 		= $this->input->post('name');
		$address 	= $this->input->post('address');
		$email 		= $this->input->post('email');
		$phone 		= $this->input->post('phone_number');
		$religion 		= $this->input->post('religion');
		$blood_group 	= $this->input->post('blood_group');
		$date_of_birth 		= $this->input->post('date_of_birth');
		$place_of_birth		= $this->input->post('place_of_birth');
		$gender 		= $this->input->post('gender');
		$citizenship 	= $this->input->post('citizenship');
		
		$this->form_validation->set_rules([
			[
				'field' => 'name',
				'label'	=> 'name',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'address',
				'label'	=> 'address',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'email',
				'label'	=> 'email',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'phone_number',
				'label'	=> 'phone_Number',
				'rules' => 'required'
			],
			[
				'field' => 'blood_group',
				'label'	=> 'blood_group',
				'rules' => 'required'
			],
			[
				'field' => 'religion',
				'label'	=> 'religion',
				'rules' => 'required'
			],
			[
				'field' => 'citizenship',
				'label'	=> 'citizenship',
				'rules' => 'required'
			],
			[
				'field' => 'gender',
				'label'	=> 'gender',
				'rules' => 'required'
			],
			[
				'field' => 'date_of_birth',
				'label'	=> 'date_of_birth',
				'rules' => 'required'
			],
			[
				'field' => 'place_of_birth',
				'label'	=> 'place_of_birth',
				'rules' => 'required'
			]

		]);

		// if ($this->form_validation->run() === FALSE) {
		// 	$this->load->view('add_ons/newCreator_new',$data);
		// } 
		// else{
		// 		$data = [
		// 			'name' => $name,
		// 			'address' => $address,
		// 			'email' => $email,
		// 			'phone_number' => $phone,
		// 			'citizenship' => $citizenship,
		// 			'gender' => $gender,
		// 			'date_of_birth' => $date_of_birth,
		// 			'place_of_birth' => $place_of_birth,
		// 			'religion' => $religion,
		// 			'blood_group' => $blood_group,
		// 			'made' => "add on"
		// 		];
		// 		$this->Add_on_creator_model_new->insert_add_on($data);
		// 		redirect('add_ons_new/list_creator');
		// 	}


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('add_ons/newCreator_new',$data);
		} else {
			if ( ! $this->upload->do_upload('image')){
				echo $this->upload->display_errors();
			}else{
				$data = $this->input->post();
				$data['image'] = $this->upload->data('file_name');
				$this->Add_on_creator_model_new->insert_creator($data);
				redirect('add_ons_new/list_creator');
			}
		}
		}
	
	public function detail_creator($id){

        $data['page_resource'] = parent::page_resources();
		$this->load->view('add_ons/detail_creator_new');
	}
	public function list_addon(){

        $data['page_resource'] = parent::page_resources();
		$data['addon'] = $this->add_on_model_new->all()->result();
		$this->load->view('add_ons/list_plugin_new',$data);
	}
	public function list_plugin(){

        $data['page_resource'] = parent::page_resources();
		$data['plugins'] = $this->Add_on_model_new->all()->result();
		$this->load->view('add_ons/list_plugin_new',$data);
	}
	public function list_creator(){
		$data['page_resource']= parent:: page_resources();
		$data['creator']= $this->Add_on_creator_model_new->all()->result();
		$this->load->view('add_ons/list_creator_new',$data);
	}
	public function edit_creator($id){
		$data['page_resource'] = parent::page_resources();
		$data['creator']=$this->Add_on_creator_model_new->details($id)->row();
		$this->load->view('add_ons/edit_creator_new',$data);
	}
	public function update_creator(){
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('phone_number', 'Telepon', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('religion', 'region', 'required');
		$this->form_validation->set_rules('date_of_birth', 'date_of_birth', 'required');
		$this->form_validation->set_rules('place_of_birth', 'place_of_birth', 'required');
		$this->form_validation->set_rules('blood_group', 'blood_group', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('citizenship', 'citizenship', 'required');
		if (!empty($_FILES['file']['name'])) {
			
			if ( ! $this->upload->do_upload('file')){
				echo $this->upload->display_errors();
			}else{
			$data['image'] = $this->upload->data('file_name');
			}
		}
		if ($this->form_validation->run() == FALSE) {
			$this->edit_creator($this->input->post('id_creator'));
		} else {
			$id=$this->input->post('id_creator');
			$data = $this->input->post();
			$this->Add_on_creator_model_new->update_creator($data,$id);
			redirect('add_ons_new/list_creator');
		}

	}
	public function delete_creator($data){
		$where = array('id_creator'=>$data);
		$this->Add_on_creator_model_new->delete_creator($where);
		redirect('add_ons_new/list_creator');
	}

	public function comment()
	{
		var_dump($this->input->post());
		$this->Add_on_model_new->tambah_comment($this->input->post());
		redirect('add_ons_new/details/'.$this->input->post('id_plugin'));
	}

}