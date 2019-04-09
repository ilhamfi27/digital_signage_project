<?php 

class Front_display extends MY_Controller{
	
	function __construct()	{
		parent::__construct();
        parent::session_needed_except();
		$this->load->helper('view_partial');
		$this->load->helper('form', 'url');
		$config['upload_path'] = './storage/images';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->model('modelcontent');
		$this->load->library('upload',$config);
	}

	public function index(){
		$data['page_resource'] = parent::page_resources();
		$this->load->model('modelcontent');
		$data['content'] = $this->modelcontent->ambil_content()->result();
		$this->load->view('front_display/tampil',$data);
	}
	public function input(){
		$data['page_resource'] = parent::page_resources();
		$this->load->view('front_display/createContent',$data);
	}

	public function inputContent(){
		$data_input['page_resource'] = parent::page_resources();
		$id 			= $this->input->post('id');
		$subject 		= $this->input->post('subject');
		$description 	= $this->input->post('description');
		$date 			= $this->input->post('date');
		$category 		= $this->input->post('category');
		
		$this->form_validation->set_rules([
			[
				'field' => 'id',
				'label'	=> 'Id`',
				'rules' => 'required|min_length[4]'
			],
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
				'field' => 'category',
				'label'	=> 'Category',
				'rules' => 'required'
			],
			[
				'field' => 'date',
				'label'	=> 'Date',
				'rules' => 'required'
			]
		]);
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('add_ons/new_addon');
		} else {
			if ( ! $this->upload->do_upload('image')){
				echo $this->upload->display_errors();
			}else{
				// echo $this->upload->data()['file_name'];
				$data_input = array(
				'id' => $id,
				'subject' => $subject,
				'description' => $description,
				'date' => $date,
				'category' => $category,
				'image' => $this->upload->data()['file_name'],
			);
			
				$this->modelcontent->input_content($data_input,'content');
				redirect('front_display/munculcontent',$data_input);
			}
		}
	}

	public function hapusContent($id){
		$where = array('id' => $id);
		$this->modelcontent->hapus_content($where,'content');
		redirect('front_display/munculcontent');
	}
	public function editContent($id){
		$data_input['page_resource'] = parent::page_resources();
		$where = array('id' => $id);
		$data_input['content'] = $this->modelcontent->edit_content('content',$where)->row();
		$this->load->view('front_display/editcontent',$data_input);
	}
	public function updateContent(){
		$id 				= $this->input->post('id');
		$subject 			= $this->input->post('subject');
		$description 		= $this->input->post('description');
		$date 				= $this->input->post('date');
		$category 			= $this->input->post('category');	
		$image 				= $this->input->post('image');

		
			$data_input = array(
				'subject' => $subject,
				'description' => $description,
				'date' => $date,
				'category' => $category,
				'image' => $image
			);
			$this->modelcontent->update_content(['id' => $id],$data_input,'content');
			redirect('front_display/munculcontent');
	}
	public function munculcontent(){
		$data_input['page_resource'] = parent::page_resources();
		$data_input['content'] = $this->modelcontent->ambil_content()->result();
		$this->load->view('front_display/munculcontent', $data_input);
	}

	public function indexLayout(){
		$data['page_resource'] = parent::page_resources();
		$this->load->model('modellayout');
		//$data['layout'] = $this->modellayout->ambil_content()->result();
		$this->load->view('front_display/tampil2',$data);
	}
	public function inputLayout(){
		$data['page_resource'] = parent::page_resources();
		//$this->load->view('front_display/createContent',$data);
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
		$this->load->view('front_display/tampil',$data);
		

	}
	public function createLayout(){
		$this->load->view('front_display/createLayout');
	}*/
}