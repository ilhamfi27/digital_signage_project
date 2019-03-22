<?php 

class Add_ons extends MY_Controller{
	
	function __construct(){
		parent::__construct();
        parent::session_needed_except();
		$this->load->helper('view_partial');
		$this->load->model('add_on_model');
		$config['upload_path'] = 'storage/images/add_ons/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload',$config);
	}
	public function index()	{
		$data['addon'] = $this->add_on_model->all()->result();
		$this->load->view('add_ons/index',$data);
	}
	public function details($id=0){
		$data['id'] = $id;
		$data = [
			'judul' => "Memo",
			'deskripsi' => "Memo untuk menyimpan catatan kecil",
			'harga' => "IDR 8000",
			'kategori' => "Produktifitas",
			'pembuat' => "Tim Lab SI"
		];
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
			if (!$this->upload->do_upload('foto')){
				echo $this->upload->display_errors();
			}else{
				$data = [
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'harga' => $harga,
					'kategori' => $kategori,
					'pembuat' => $pembuat,
					'foto' => $this->upload->data()['file_name'],
					'screenshot' => 'xxx'
				];
				$this->add_on_model->insert_add_on($data);
				redirect('add_ons/details');
			}
		}

	}
	public function delete_add_on($data){
		$where = array('id'=>$data);
		$this->delete_add_on->where($where);
		redirect('add_ons/index');
	}
	public function edit_add_on($id){
		$where = array('id'=>$id);
		$data['addon']=$this->Add_on_model->details($where)->result();
		$this->resource_views();
		$this->load->view('add_ons/edit_add_on',$data);
	}
	public function update_add_on(){
		$id = $this->iput->post('id');
		$foto = $this->iput->post('foto');
		$judul = $this->iput->post('judul');
		$deskripsi = $this->iput->post('deskripsi');
		$kategori = $this->iput->post('kategori');
		$pembuat = $this->iput->post('pembuat');
		$screenshot = $this->iput->post('screenshot');
	
		$data = array(
			'foto'=>$foto,
			'judul'=>$judul,
			'deskripsi'=>$deskripsi,
			'kategori'=>$kategori,
			'pembuat'=>$pembuat,
			'screenshot'=>$screenshot
		);
		$where = array(
			'id'=>$id
		);

	}
	public function install_addon()	{
		$this->load->view('add_ons/install_addon');
	}
	public function new_creator(){
		$this->load->view('add_ons/newCreator');
	}
	public function create_creator(){
		// $nama = this->input->post('nama');
		// $tanggal_lahir = this->input->post('tanggal_lahir');
		// $nama = this->input->post('nama');
		redirect('add_ons/detail_creator/lab_si');
	}
	public function detail_creator($id){
		$this->load->view('add_ons/detail_creator');
	}
	public function list_addon(){
		$this->load->view('add_ons/list_addon');
	}
}