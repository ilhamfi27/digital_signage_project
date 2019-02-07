<?php 

class Front_display extends CI_Controller{
	
	function __construct()	{
		parent::__construct();
			}

	public function index(){
		$data['dropdown_data'] = array(
					'samll'=>'Small video',
					'med'=>'Medium video',
					'large'=>'Large video',
					'xlarge'=>'Ekstra large video'
		);
		$this->load->view('front_display/index', $data);
	}
	public function content(){
		$content1 = $this->input->post('content1');
		$content1 = $this->input->post('content2');
		$content1 = $this->input->post('content3');
		$content1 = $this->input->post('content4');
		$content1 = $this->input->post('content5');
		$content1 = $this->input->post('content6');
		

	}
}