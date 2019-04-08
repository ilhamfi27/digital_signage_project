<?php
class Creator extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('creator_model', 'creator_m');
    }

    public function index(){
        
    }

    public function new(){
        $data['page_resource'] = parent::page_resources();
        $this->load->view('creator/new', $data);
    }

    public function insert(){
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $birth_place = $this->input->post('birth_place');
        $birth_date = $this->input->post('birth_date');
        $phone_number = $this->input->post('phone_number');
        $email = $this->input->post('email');

        $input_data = [
            'name' => $name,
            'address' => $address,
            'birth_place' => $birth_place,
            'birth_date' => $birth_date,
            'phone_number' => $phone_number,
            'email' => $email
        ];

        if($this->creator_m->insert($input_data) > 0){
            redirect('creator/list');
        } else {
            $this->load->view('creator/new');
        }
    }

    public function edit($id){
        $data['page_resource'] = parent::page_resources();
        $data['creator'] = $this->creator_m->detail($id)->row();
        $this->load->view('creator/edit', $data);
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function detail($id){
        $data['page_resource'] = parent::page_resources();
        $data['creator'] = $this->creator_m->detail($id)->row();
        $this->load->view('creator/detail', $data);
    }

    public function list(){
        $data['page_resource'] = parent::page_resources();
        $data['creators'] = $this->creator_m->all()->result();
        $this->load->view('creator/list', $data);
    }


}
