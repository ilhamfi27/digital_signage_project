<?php
class Category extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model', 'category_m');
    }

    public function index(){
        
    }

    public function new(){
        $data['page_resource'] = parent::page_resources();
        $this->load->view('category/new', $data);
    }

    public function insert(){
        $category_name = $this->input->post('category_name');
        $input_data = [
            'category_name' => $category_name
        ];

        if($this->category_m->insert($input_data) > 0){
            redirect('category/list');
        } else {
            $this->load->view('category/new');
        }
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function detail(){
        
    }

    public function list(){
        $data['page_resource'] = parent::page_resources();
        $data['categories'] = $this->category_m->all()->result();
        $this->load->view('category/list', $data);
    }


}
