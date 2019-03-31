<?php 

class Front_display extends MY_Controller{
	
	public function __construct()	{
		parent::__construct();
        parent::session_needed_except();
		$this->load->helper('view_partial');
		$this->load->helper('form', 'url');
		$this->load->model('modelcontent');
	}

	public function index(){
		$this->load->model('modelcontent');
		$data['content'] = $this->modelcontent->ambil_content()->result();
		$this->load->view('front_display/tampil',$data);
	}
	public function input(){
		$this->load->view('front_display/createContent');
	}

	public function inputContent(){
		$id 		= $this->input->post('id');
		$subject 	= $this->input->post('subject');
		$description 		= $this->input->post('description');
		$date = $this->input->post('date');
		$category = $this->input->post('category');
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|png';
		// $config['max_size'] = 10240;
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;
		
		$this->load->library('upload',$config);
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

	public function hapusContent($id){
		$where = array('id' => $id);
		$this->modelcontent->hapus_content($where,'content');
		redirect('front_display/munculcontent');
	}
	public function editContent($id){
		$where = array('id' => $id);
		$data['content'] = $this->modelcontent->edit_content($where,'content')->result();
		$this->load->view('front_display/editcontent',$data);
	}
	public function updateContent(){
		$id 		= $this->input->post('id');
		$subject 	= $this->input->post('subject');
		$description 		= $this->input->post('description');
		$image 	= $this->input->post('image');
		$date = $this->input->post('date');
		$category = $this->input->post('category');
		$data = array(
			'id' => $id,
			'subject' => $subject,
			'description' => $description,
			'image' => $image,
			'date' => $date,
			'category' => $category,
		);
		$where = array('id' => $id);
		$this->modelcontent->update_content($where,$data,'content');
		redirect('front_display/munculcontent');
	}
	public function munculcontent(){
		$data['content'] = $this->modelcontent->ambil_content()->result();
		$this->load->view('front_display/munculcontent', $data);
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