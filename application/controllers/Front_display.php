<?php 

class Front_display extends MY_Controller{
	
	function __construct()	{
		parent::__construct();
        parent::session_needed_except();
	}

	public function index(){
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
}