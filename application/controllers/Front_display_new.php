<?php 

class Front_display_new extends MY_Controller{
	
	function __construct()	{
		parent::__construct();
        parent::session_needed_except();
		$this->load->helper('view_partial');
		$this->load->helper('form', 'url');
		$config['upload_path'] = './storage/images/front_display';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->model('modellayout_new');
		$this->load->model('modelcontent_new');
		$this->load->model('Add_on_model_new');
		$this->load->library('upload',$config);
	}

	public function index(){
		$data['page_resource'] = parent::page_resources();
		$this->load->model('modelcontent_new');
		$data['content'] = $this->modelcontent_new->ambil_content()->result();
		$this->load->view('front_display/tampil_new',$data);
	}

	public function inputContent(){
		
		$data['page_resource'] = parent::page_resources();
		$data['content_category'] = $this->modelcontent_new->ambil_content_category()->result();
		$subject 		= $this->input->post('subject');
		$description 	= $this->input->post('description');
		$date 			= $this->input->post('date');
		$category 		= $this->input->post('category');
		
		$this->form_validation->set_rules([

			[
				'field' => 'subject',
				'label'	=> 'Subject',
				'rules' => 'required|min_length[5]'
			],
			[
				'field' => 'description',
				'label'	=> 'Description',
				'rules' => 'required|min_length[10]'
			],
			[
				'field' => 'id_content_category',
				'label'	=> 'id_content_Category',
				'rules' => 'required'
			],
			[
				'field' => 'date',
				'label'	=> 'Date',
				'rules' => 'required'
			]
		]);
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front_display/createContent_new',$data);
		} else {
			if ( ! $this->upload->do_upload('file')){
				echo $this->upload->display_errors();
			}else{
				$data_content_category = $this->input->post();
				$data_content_category['user_id'] = $this->session->userdata('id');
				$data_content_category['file'] = $this->upload->data('file_name');
				$this->modelcontent_new->input_content($data_content_category,'content');
				redirect('front_display_new/munculcontent');
			}
		}
	}

	public function hapusContent($id){
		$where = array('id_content' => $id);
		$this->modelcontent_new->hapus_content($where,'content');
		redirect('front_display_new/munculcontent');
	}
	public function editContent($id){
		$data['page_resource'] = parent::page_resources();
		$where = array('id_content' => $id);
		$data['content_category'] = $this->modelcontent_new->ambil_content_category()->result();
		$data['content'] = $this->modelcontent_new->edit_content('content',$where)->row();
		$this->load->view('front_display/editcontent_new',$data);
	}
	public function updateContent(){
		// $subject 			= $this->input->post('subject');
		// $description 		= $this->input->post('description');
		// $date 				= $this->input->post('date');
		// $id_content_category 			= $this->input->post('id_content_category');	
		// $file 				= $this->input->post('file');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');
		
		$data = $this->input->post();
		if (!empty($_FILES['file']['name'])) {
			
			if ( ! $this->upload->do_upload('file')){
				echo $this->upload->display_errors();
			}else{
			$data['file'] = $this->upload->data('file_name');
			}
		}

		if ($this->form_validation->run() == FALSE) {
			$this->editContent($this->input->post('id_content'));
		} else {
			$this->modelcontent_new->update_content(['id_content' => $this->input->post('id_content')],$data,'content');
			redirect('front_display_new/munculcontent');
		}
	}
	public function munculcontent(){
		//pagination
		// $this->load->database();
  //       $paging = $this->modelcontent_new->paging();
  //       $this->load->library('pagination');
  //       $config['base_url'] = base_url().'index.php/Front_display_new/inputContent/';
  //       $config['total_rows'] = $paging;
  //       $config['per_page'] = 3;
  //       $from = $this->uri->segment(3);
  //       $this->pagination->initialize($config);     
  //       $data['content'] = $this->modelcontent_new->paging_halaman($config['per_page'],$from);
  //       $this->load->view('front_display/munculcontent',$data);

		$id = $this->session->userdata('id');
		
			$data['page_resource'] = parent::page_resources();
			$data['content'] = $this->modelcontent_new->ambil_content($id)->result();
			$this->load->view('front_display/munculcontent_new', $data);
	}

	public function input_content_category(){
		
		$data['page_resource'] = parent::page_resources();
		$category		= $this->input->post('category');
		
		$this->form_validation->set_rules([
			[
				'field' => 'category',
				'label'	=> 'category',
				'rules' => 'required'
			],
		]);
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front_display/createContent_category_new', $data);
		} else{
				$data = array(
				'category' => $category,
			);
			
				$this->modelcontent_new->input_content_category($data,'content_category');
				redirect('front_display_new/munculcontent_category');
			}
	}

	public function hapusContent_category($id){
		$where = array('id_content_category' => $id);
		$this->modelcontent_new->hapus_content_category($where,'content_category');
		redirect('front_display_new/munculcontent_category');
	}
	public function editContent_category($id){
		$data['page_resource'] = parent::page_resources();
		$where = array('id_content_category' => $id);
		$data['content_category'] = $this->modelcontent_new->edit_content_category('content_category',$where)->row();
		$this->load->view('front_display/editcontent_category_new',$data);
	}
	public function updateContent_category(){
		$this->form_validation->set_rules('category', 'category', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->editContent_category($this->input->post('id_content_category'));
		} else {
		$category			= $this->input->post('category');
		
			$this->modelcontent_new->update_content_category(['id_content_category' => $this->input->post('id_content_category')],['category' => $category],'content_category');
			redirect('front_display_new/munculcontent_category');
		}
	}
	public function munculcontent_category(){
		//pagination
		// $this->load->database();
  //       $paging = $this->modelcontent_new->paging();
  //       $this->load->library('pagination');
  //       $config['base_url'] = base_url().'index.php/Front_display_new/inputContent/';
  //       $config['total_rows'] = $paging;
  //       $config['per_page'] = 3;
  //       $from = $this->uri->segment(3);
  //       $this->pagination->initialize($config);     
  //       $data['content'] = $this->modelcontent_new->paging_halaman($config['per_page'],$from);
  //       $this->load->view('front_display/munculcontent',$data);


		$data['page_resource'] = parent::page_resources();
		$data['content_category'] = $this->modelcontent_new->ambil_content_category()->result();
		$this->load->view('front_display/munculcontent_category_new', $data);
	}



	//Search
	public function search(){
		$keyword = $this->input->post('keyword');
        $data_input['content'] = $this->modelcontent_new->search($keyword);
        $this->load->view('front_display/searchcontent_new',$data_input);
		
	}

	public function indexLayout(){
		$data['page_resource'] = parent::page_resources();
		$this->load->model('modellayout_new');
		//$data['layout'] = $this->modellayout->ambil_content()->result();
		$this->load->view('front_display/tampil2_new',$data);
	}
	public function inputLayout(){
		$data['page_resource'] = parent::page_resources();
		$data['layout'] = $this->modellayout_new->ambil_layout()->result();
		
		$this->load->view('front_display/createLayout_new',$data);
	}

	public function hapusLayout($id){
		$where = array('id_Layout' => $id);
		$this->modellayout_new->hapus_layout($where,'layout');
		redirect('front_display_new/munculLayout');
	}
	public function editLayout($id){
		$data['page_resource'] = parent::page_resources();
		$where = array('id_layout' => $id);
		$data['layout'] = $this->modellayout_new->edit_layout('layout',$where)->row();
		$this->load->view('front_display/editlayout_new',$data);
	}
	public function updateLayout(){
		$layout			= $this->input->post('layout');
		$position = $this->post('position');
		$this->form_validation->set_rules('position', 'position', 'required');
		
	
			$this->modellayout_new->update_layout(['id_layout' => $this->input->post('id_layout')],['position' => $position],'layout');
			redirect('front_display_new/munculLayout');
	}
	public function munculLayout(){

		$data['page_resource'] = parent::page_resources();
		$data['layout'] = $this->modellayout_new->ambil_layout()->result();
		$this->load->view('front_display/muncullayout_new', $data);
	}

	public function detailLayout($id){
		$data['page_resource'] = parent::page_resources();
		$data['layout'] = $this->modellayout_new->ambil_layout($id)->row(1);
		$this->load->view('front_display/detaillayout_new',$data);
	}

	public function inputLayoutContent(){
		$kanan = $this->input->post('id_content_kanan');
		$kiri = $this->input->post('id_content_kiri');
		$id_layout = $this->input->post('id_layout');

		$kanan_input = $this->db->insert('cl', array('id_layout' => $id_layout,'position' => 'kanan', 'id_content' => $kanan));
		if ($kanan_input) {
			$kiri_input = $this->db->insert('cl', array('id_layout' => $id_layout,'position' => 'kiri', 'id_content' => $kiri));
		}
		redirect('front_display_new/detaillayout/'.$id_layout);
	}

	// public function hapusLayoutContent(){
	// 	$this->modellayout_new->hapus_layout($where,'cl');
	// 	redirect('front_display_new/munculLayoutContent');
	// }
	// public function editLayoutContent($id){
	// 	$data['page_resource'] = parent::page_resources();
	// 	$where = array('id_layout' => $id);
	// 	$data['layout'] = $this->modellayout_new->edit_layout('cl',$where)->row();
	// 	$this->load->view('front_display/editlayoutContent_new',$data);
	// }
	// public function updateLayoutContent(){
	// 	$cl			= $this->input->post('cl');
	// 	$position = $this->post('position');
	// 	$this->form_validation->set_rules('position', 'position', 'required');
		
	
	// 		$this->modellayout_new->update_layout(['id_layout' => $this->input->post('id_layout')],['position' => $position],'layout');
	// 		redirect('front_display_new/munculLayout');
	// }
	// public function munculLayoutContent(){

	// 	$data['page_resource'] = parent::page_resources();
	// 	$data['layout'] = $this->modellayout_new->ambil_layout()->result();
	// 	$this->load->view('front_display/muncullayout_new', $data);
	// }

	public function detailInput($id){
		$data['page_resource'] = parent::page_resources();
		$data['layout'] = $this->modellayout_new->ambil_layout($id)->row(1);
		$data['content'] = $this->modelcontent_new->ambil_content($id);
		$data['plugins'] = $this->Add_on_model_new->all();
		$this->load->view('front_display/insertContent_new',$data);
	}

	public function inputLayoutAdmin(){
		$data['page_resource'] = parent::page_resources();
		$data['layout'] = $this->modellayout_new->ambil_layoutAdmin()->result();
		$position 	= $this->input->post('position');

		$this->form_validation->set_rules([

			[
				'field' => 'position',
				'label'	=> 'position',
				'rules' => 'required'
			],
			
		]);
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front_display/createLayoutAdmin_new',$data);
		} else{
			if ( ! $this->upload->do_upload('image')){
				echo $this->upload->display_errors();
			}else{
				$data = $this->input->post();
				$data['image'] = $this->upload->data('file_name');
				$this->modellayout_new->input_layoutAdmin($data,'layout');
				redirect('front_display_new/munculLayoutAdmin');
			}
		}
	}

	public function hapusLayoutAdmin($id){
		$where = array('id_Layout' => $id);
		$this->modellayout_new->hapus_layoutAdmin($where,'layout');
		redirect('front_display_new/munculLayoutAdmin');
	}
	public function editLayoutAdmin($id){
		$data['page_resource'] = parent::page_resources();
		$where = array('id_layout' => $id);
		$data['layout'] = $this->modellayout_new->ambil_layoutAdmin()->row(1);
		$this->load->view('front_display/editlayoutAdmin_new',$data);
	}
	public function updateLayoutAdmin(){
		$layout			= $this->input->post('layout');
		$position = $this->input->post('position');
		$this->form_validation->set_rules('position', 'position', 'required');

		if (!empty($_FILES['file']['name'])) {
			
			if ( ! $this->upload->do_upload('image')){
				echo $this->upload->display_errors();
			}else{
			$data['image'] = $this->upload->data('file_name');
			}
		}
	

		if ($this->form_validation->run() === FALSE) {
			$this->editLayoutAdmin($this->input->post('id_layout'));
		} else{
			$this->modellayout_new->update_layoutAdmin(['id_layout' => $this->input->post('id_layout')],['position' => $position],'layout');
			redirect('front_display_new/munculLayoutAdmin');
			}
	}
	public function munculLayoutAdmin(){

		$data['page_resource'] = parent::page_resources();
		$data['layout'] = $this->modellayout_new->ambil_layoutAdmin()->result();
		$this->load->view('front_display/muncullayoutAdmin_new', $data);
	}

	public function vieww($id_layout, $id_user){
		$data['cl'] = $this->modellayout_new->finall($id_layout, $id_user)->result();
		$this->load->view('front_display/final', $data);
	}


	/*public function index(){
		$data['dropdown_data'] = array(
					'samll_video'=>'Small video',
					'medidum_video'=>'Medium video',
					'large_video'=>'Large video',
					'xlarge_video'=>'Ekstra large video'
		);
		$this->load->view('front_display/index', $data);
	}
	public function content(){
		$content1 = $this->input->post('content1');
		$content2 = $this->input->post('content2');
		$content3 = $this->input->post('content3');
		$content4 = $this->input->post('content4');
		$content5 = $this->input->post('content5');
		$content6 = $this->input->post('content6');
		$data['content1'] = $content1;
		$data['content2'] = $content2;
		$data['content3'] = $content3;
		$data['content4'] = $content4;
		$data['content5'] = $content5;
		$data['content6'] = $content6;
		$this->load->view('front_display/tampil_new',$data);
		

	}
	public function createLayout(){
		$this->load->view('front_display/createLayout');
	}*/
}