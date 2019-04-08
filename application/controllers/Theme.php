<?php
/**
 * 
 * 
 */
class Theme extends MY_Controller{
    public function __construct() {
        parent::__construct();
        parent::session_needed_except();
		$this->load->helper('view_partial');
		$this->load->model('creator_model','creator_m');
		$this->load->model('category_model','category_m');
		$this->load->model('plugin_model','plugin_m');
	}
	
	public function index()	{
        $data['page_resource'] = parent::page_resources();
		$this->load->view('theme/index', $data);
	}

    public function new() {
		$data['page_resource'] = parent::page_resources();
		$data['creators'] = $this->creator_m->all()->result();
		$data['categories'] = $this->category_m->all()->result();
        $this->load->view('theme/new',$data);
    }

    public function insert() {
        $title 		    = $this->input->post('title');
		$description 	= $this->input->post('description');
		$category 	    = $this->input->post('category');
		$creator 	    = $this->input->post('creator');
		$screenshots    = $this->input->post('screenshots');

		$this->form_validation->set_rules([
			[
				'field' => 'title',
				'label'	=> 'Title',
				'rules' => 'trim|required|min_length[4]'
			],
			[
				'field' => 'description',
				'label'	=> 'Description',
				'rules' => 'trim|required|min_length[4]'
			],
			[
				'field' => 'category',
				'label'	=> 'Category',
				'rules' => 'trim|required'
			],
			[
				'field' => 'creator',
				'label'	=> 'Creator',
				'rules' => 'trim|required'
			]
		]);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('theme/new');
		} else {
			$data = [
				'uploaded_date' => parent::local_timestamp(),
				'title' => $title,
				'description' => $description,
				'id_creator' => $category,
				'id_category' => $creator
			];
			if($this->plugin_m->insert($data) > 0){
				redirect('theme/insert');
			}
		}
	}
	
	public function detail(){
		$data['page_resource'] = parent::page_resources();
		$data = [
			'title' => 'Ini Judul',
			'description' => 'Ini Deskripsi',
			'category' => 'Ini Kategori',
			'creator' => 'Ini pembuat',
			'screenshots' => 'Harusnya Gambar'
		];
		$this->load->view('theme/detail', $data);
	}

	public function list(){
		$data['page_resource'] = parent::page_resources();
		$data['detailed_data'] = $this->plugin_m->detailed_plugin()->result();
		$this->load->view('theme/list', $data);
	}
}