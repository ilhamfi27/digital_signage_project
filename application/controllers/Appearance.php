<?php
/**
 * 
 * 
 */
class Appearance extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('view_partial');
	}
	
	public function index()	{
		$this->load->view('appearance/index');
	}

    public function new_theme() {
        $this->load->view('appearance/new_theme');
    }

    public function insert_new_theme() {
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
				'rules' => 'trim|required|min_length[4]|max_length[30]'
			],
			[
				'field' => 'screenshots',
				'label'	=> 'Screenshots',
			]
		]);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('appearance/new_theme');
		} else {
			$data = [
				'title' => $title,
				'description' => $description,
				'category' => $category,
				'creator' => $creator,
				'screenshots' => $screenshots
			];
			$this->load->view('appearance/detail', $data);
		}
	}
	
	public function detail(){
		$data = [
			'title' => 'Ini Judul',
			'description' => 'Ini Deskripsi',
			'category' => 'Ini Kategori',
			'creator' => 'Ini pembuat',
			'screenshots' => 'Harusnya Gambar'
		];
		$this->load->view('appearance/detail', $data);
	}
}