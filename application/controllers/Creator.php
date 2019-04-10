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
        $data['page_resource'] = parent::page_resources();
        
        $name           = $this->input->post('name');
        $address        = $this->input->post('address');
        $birth_place    = $this->input->post('birth_place');
        $birth_date     = $this->input->post('birth_date');
        $phone_number   = $this->input->post('phone_number');
        $email          = $this->input->post('email');

        $this->form_validation->set_rules([
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[4]|max_length[40]'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'birth_place',
                'label' => 'Birth Place',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'birth_date',
                'label' => 'Birth Date',
                'rules' => 'required'
            ],
            [
                'field' => 'phone_number',
                'label' => 'Phone Number',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ]
        ]);
        
        $input_data = [
            'name' => $name,
            'address' => $address,
            'birth_place' => $birth_place,
            'birth_date' => $birth_date,
            'phone_number' => $phone_number,
            'email' => $email
        ];

        if ($this->form_validation->run() === FALSE) {
            // $this->load->view('creator/new', $data);
            $errors = validation_errors(NULL, NULL);
            echo json_encode(['errors' => $errors]);
        } else {
            $input_status = $this->creator_data_transaction($input_data);
            if ($input_status['is_error'] === FALSE) {
                // redirect('');
                echo json_encode(['success' => "Record Added Successfully"]);
            } else {
                // $this->load->view('creator/new', $data);
                echo json_encode(['errors' => $input_status['errors']]);
            }
            
        }
    }

    private function creator_data_transaction($data){
        $this->photo_upload_config();
        if (!$this->upload->do_upload('photo')){
            $error = $this->upload->display_errors();
            return [
                'is_error' => TRUE,
                'errors' => $error
            ];
        }else{
            $data['photo'] = $this->upload->data()['orig_name'];
            $db_operation = $this->creator_m->insert($data);
            return [
                'is_error' => FALSE
            ];
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

    private function photo_upload_config(){
        // photo configuration
        $new_file_name                  = "c_".time()."_".$this->session->userdata('id');
        $config['upload_path']          = 'storage/images/creator_photo';
		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $new_file_name;
        $this->load->library('upload', $config);
    }

}
