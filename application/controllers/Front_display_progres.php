<?php  

class front_display_progres extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('modellayout');
	}
		public function index()
	{
		$this->load->model('modellayout');
		$data['layout'] = $this->modellayout->ambil_data()->result();
		$this->load->view('front_display/inputlayout',$data);
	}
	public function input(){
		$this->load->view('front_display/inputlayout');
	}

	public function inputlayout(){
		$id 		= $this->input->post('id');
		$nama_frontDisplay 	= $this->input->post('nama_frontDisplay');
		$deskripsi 		= $this->input->post('deskripsi');
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|png';
		// $config['max_size'] = 10240;
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload('gambar')){
			echo $this->upload->display_errors();
		}else{
			// echo $this->upload->data()['file_name'];
			$data = array(
				'id' => $id,
				'nama_frontDisplay' => $nama_frontDisplay,
				'deskripsi' => $deskripsi,
				'gambar' => $this->upload->data()['file_name'],
			);
			$this->modellayout->input_data($data,'layout');
			redirect('front_display_progres/muncul',$data);
		}
	}

	public function hapuslayout($id){
		$where = array('id' => $id);
		$this->modellayout->hapus_data($where,'layout');
		redirect('front_display_progres/muncul');
	}
	public function editlayout($id){
		$where = array('id' => $id);
		$data['layout'] = $this->modellayout->edit_data($where,'layout')->result();
		$this->load->view('front_display/editlayout',$data);
	}
	public function updatelayout(){
		$id 		= $this->input->post('id');
		$nama_frontDisplay 	= $this->input->post('nama_frontDisplay');
		$deskripsi 		= $this->input->post('deskripsi');
		$gambar 	= $this->input->post('gambar');
		$data = array(
			'id' => $id,
			'nama_frontDisplay' => $nama_frontDisplay,
			'deskripsi' => $deskripsi,
			'gambar' => $gambar,
		);
		$where = array('id' => $id);
		$this->modellayout->update_data($where,$data,'layout');
		redirect('front_display_progres/muncul');
	}
	public function muncul(){
		$data['layout'] = $this->modellayout->ambil_data()->result();
		$this->load->view('front_display/muncul', $data);
	}
}