<?php 
class Add_ons extends MY_Controller{
	
	function __construct(){
		parent::__construct();
        parent::session_needed_except();
		$this->load->helper('view_partial');
		$this->load->model('add_on_model');
		$this->load->model('add_on_creator_model');
		$config['upload_path'] = 'storage/images/add_ons/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload',$config);
	}

	public function index()	{
        $data['page_resource'] = parent::page_resources();
		$data['addon'] = $this->add_on_model->all()->result();
		$this->load->view('add_ons/index',$data);
	}

	public function details($id=0){

        $data['page_resource'] = parent::page_resources();
		$data['id'] = $id;
		$data['addons'] = [
			'judul' => "Memo",
			'deskripsi' => "Memo untuk menyimpan catatan kecil",
			'harga' => "IDR 8000",
			'kategori' => "Produktifitas",
			'pembuat' => "Tim Lab SI"
		];
		$data['addons'] = (object) $data['addons'];
		$this->load->view('add_ons/details', $data);
	}
	public function new_addon(){
        $data['page_resource'] = parent::page_resources();
		$this->load->view('add_ons/new_addon',$data);
	}
	public function insert_add_on(){

        $data['page_resource'] = parent::page_resources();
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
			$this->load->view('add_ons/new_addon',$data);
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
				redirect('add_ons/list_addon');
			}
		}
	}
	public function delete_add_on($data){
		$where = array('id'=>$data);
		$this->add_on_model->delete_add_on($where);
		redirect('add_ons/list_addon');
	}
	public function edit_add_on($id){
        $data['page_resource'] = parent::page_resources();
		$where = array('id'=>$id);
		$data['addon']=$this->add_on_model->details($where)->row();
		$this->load->view('add_ons/edit_addon',$data);
	}
	public function update_add_on(){
		$id = $this->input->post('id');
		$foto = $this->input->post('foto');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$kategori = $this->input->post('kategori');
		$pembuat = $this->input->post('pembuat');
		$harga = $this->input->post('harga');
		$screenshot = $this->input->post('screenshot');
	
		$data = array(
			'foto'=>$foto,
			'judul'=>$judul,
			'deskripsi'=>$deskripsi,
			'kategori'=>$kategori,
			'pembuat'=>$pembuat,
			'harga'=>$harga,
			'screenshot'=>$screenshot
		);
		$this->add_on_model->update($data,$id);
		redirect('add_ons/list_addon');

	}
	public function install_addon()	{

        $data['page_resource'] = parent::page_resources();
		$this->load->view('add_ons/install_addon',$data);
	}
	public function new_creator(){
        $data['page_resource'] = parent::page_resources();
		$this->load->view('add_ons/newCreator',$data);
	}
	public function create_creator(){
		$data['page_resource'] = parent::page_resources();
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat');
		$tanggal_lahir = $this->input->post('tanggal');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		
		
		$this->form_validation->set_rules([
			[
				'field' => 'nama',
				'label'	=> 'Nama',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'alamat',
				'label'	=> 'Alamat',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'tempat',
				'label'	=> 'Tempat',
				'rules' => 'required|min_length[4]'
			],
			[
				'field' => 'tanggal',
				'label'	=> 'Tanggal',
				'rules' => 'required'
			],
			[
				'field' => 'telepon',
				'label'	=> 'Telepon',
				'rules' => 'required|min_length[4]numeric'
			],
			[
				'field' => 'email',
				'label'	=> 'Email',
				'rules' => 'required|min_length[4]'
			]
		]);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('add_ons/newCreator',$data);
		} else {
			if (!$this->upload->do_upload('foto')){
				echo $this->upload->display_errors();
			}else{
				$data = [
					'nama' => $nama,
					'alamat' => $alamat,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'no_telp' => $telepon,
					// 'foto' => $this->upload->data()['file_name'],
					'email'=>$email
				];
				$this->add_on_creator_model->insert_add_on($data);
				redirect('add_ons/list_creator');
			}
		}
	}
	public function detail_creator($id){

        $data['page_resource'] = parent::page_resources();
		$this->load->view('add_ons/detail_creator');
	}
	public function list_addon(){

        $data['page_resource'] = parent::page_resources();
		$data['addon'] = $this->add_on_model->all()->result();
		$this->load->view('add_ons/list_addon',$data);
	}
	public function list_creator(){
		$data['page_resource']= parent:: page_resources();
		$data['creator']= $this->add_on_creator_model->all()->result();
		$this->load->view('add_ons/list_creator',$data);
	}
	public function edit_creator($id){
		$data['page_resource'] = parent::page_resources();
		$where = array('id'=>$id);
		$data['creator']=$this->add_on_creator_model->details($where)->row();
		$this->load->view('add_ons/edit_creator',$data);
	}
	public function update_creator(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat');
		$tanggal_lahir = $this->input->post('tanggal');
		$no_telp = $this->input->post('telepon');
		$email = $this->input->post('email');
		
		$data = array(
			'nama'=>$nama,
			'alamat'=>$alamat,
			'tempat_lahir'=>$tempat_lahir,
			'tanggal_lahir'=>$tanggal_lahir,
			'no_telp'=>$no_telp,
			'email'=>$email
			
		);
		$this->add_on_creator_model->update($data,$id);
		redirect('add_ons/list_creator');

	}
	public function delete_creator($data){
		$where = array('id'=>$data);
		$this->add_on_creator_model->delete_add_on($where);
		redirect('add_ons/list_creator');
	}

}