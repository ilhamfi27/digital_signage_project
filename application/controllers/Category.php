<?php
class Category extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model', 'category_m');
    }

    public function index() {
        $data['page_resource'] = parent::page_resources();
        $data['categories'] = $this->category_m->all()->result();
        $this->load->view('category/index', $data);
    }

    public function insert() {
        $data['page_resource'] = parent::page_resources();
        $data['categories'] = $this->category_m->all()->result();
        $category_name = $this->input->post('category_name');

        $this->form_validation->set_rules([
            [
                'field' => 'category_name',
                'label' => 'Category Name',
                'rules' => 'required|trim|min_length[4]|max_length[40]'
            ]
        ]);

        $input_data = [
            'category_name' => $category_name
        ];

        if ($this->form_validation->run() === FALSE) {
            // $this->load->view('category/index', $data);
            $errors = validation_errors(NULL, NULL);
            echo json_encode(['errors' => $errors]);
        } else {
            if($this->category_m->insert($input_data) > 0){
                // redirect('category/index');
                echo json_encode([
                    'success' => "Record Added Successfully",
                    'new_data' => $input_data,
                    'base_url' => base_url(),
                    'last_id' => $this->category_m->new_last_id()
                ]);
            } else {
                // $this->load->view('category/index', $data);
                echo json_encode(['errors' => "Record Failed To Added"]);
            }
        }
        
    }

    public function update() {
        $data['page_resource'] = parent::page_resources();
        $data['categories'] = $this->category_m->all()->result();
        $id             = $this->input->post('id');
        $category_name  = $this->input->post('category_name');

        $this->form_validation->set_rules([
            [
                'field' => 'category_name',
                'label' => 'Category Name',
                'rules' => 'required|trim|min_length[4]|max_length[40]'
            ]
        ]);

        $input_data = [
            'category_name' => $category_name
        ];
        
        if ($this->form_validation->run() === FALSE) {
            // $this->load->view('creator/new', $data);
            $errors = validation_errors(NULL, NULL);
            echo json_encode(['errors' => $errors]);
        } else {
            $where = ['id' => $id];
            if ($this->category_m->update($input_data, $where)) {
                // redirect('');
                echo json_encode(['success' => "Record Updated Successfully"]);
            } else {
                // $this->load->view('creator/new', $data);
                echo json_encode(['errors' => "Record Failed To Change"]);
            }
            
        }
    }

    public function delete($id) {
        // $id = $this->input->post("id");
        $db_result = $this->category_m->delete(['id' => $id]);
        if ($db_result) {
            echo json_encode(['success' => "Record Deleted Successfully"]);
        } else {
            $code = $this->category_m->get_error()['code'];
            $error_messages = [
                1451 => "It is a PARENT of a sort of data."
            ];
            echo json_encode(['errors' => "Record Failed To Deleted! " .$error_messages[$code]]);
        }
    }
}
