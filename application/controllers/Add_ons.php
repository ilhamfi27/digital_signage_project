<?php 

class Add_ons extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('view_partial');
	}
	public function index()	{
		$this->load->view('add_ons/index');
	}
	public function details($id=0){
		$data['id'] = $id;
		$this->load->view('add_ons/details', $data);
	}
	public function new_addon(){
		$this->load->view('add_ons/new_addon');
	}
	public function insert_add_on(){
		$judul 		= $this->input->post('judul');
		$deskripsi 	= $this->input->post('deskripsi');
		$harga 		= $this->input->post('harga');
		$kategori 	= $this->input->post('kategori');
		$pembuat 	= $this->input->post('pembuat');
		$screenshot = $this->input->post('screenshot');

		$this->form_validation->set_rules([
			[
				'field' => 'judul',
				'label'	=> 'Judul',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'deskripsi',
				'label'	=> 'Deskripsi',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'harga',
				'label'	=> 'Harga',
				'rules' => 'required|min_length[4]|numeric'
			],
			[
				'field' => 'kategori',
				'label'	=> 'Kategori',
				'rules' => 'required'
			],
			[
				'field' => 'pembuat',
				'label'	=> 'Pembuat',
				'rules' => 'required|min_length[4]'
			]
		]);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('add_ons/new_addon');
		} else {
			$data = [
				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'harga' => $harga,
				'kategori' => $kategori,
				'pembuat' => $pembuat
			];
			$this->load->view('add_ons/details', $data);
		}

	}
}