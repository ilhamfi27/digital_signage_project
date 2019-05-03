<?php
class Creator extends MY_Controller {
    public function __construct() {
        parent::__construct();
        parent::session_needed_except();
        parent::these_method_for("new|update","admin");
        $this->load->model('creator_model', 'creator_m');
    }

    public function index() {
        
    }

    public function new_() {
        $data['page_resource'] = parent::page_resources();
        $this->load->view('creator/new', $data);
    }

    public function insert() {
        // $data['page_resource'] = parent::page_resources();
        
        $name           = $this->input->post('name');
        $date_of_birth  = $this->input->post('date_of_birth');
        $place_of_birth = $this->input->post('place_of_birth');
        $phone_number   = $this->input->post('phone_number');
        $gender         = $this->input->post('gender');
        $religion       = $this->input->post('religion');
        $blood_type     = $this->input->post('blood_type');
        $citizenship    = $this->input->post('citizenship');
        $address        = $this->input->post('address');
        $email          = $this->input->post('email');
        $image          = $this->input->post('image');
        $made           = $this->input->post('made');

        $this->form_validation->set_rules([
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z ]+$/]'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim|min_length[4]'
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
            ],
            [
				'field' => 'blood_type',
				'label'	=> 'Blood Type',
				'rules' => 'required'
			],
            [
				'field' => 'religion',
				'label'	=> 'Religion',
				'rules' => 'required'
			],
            [
				'field' => 'citizenship',
				'label'	=> 'Citizenship',
				'rules' => 'required'
			],
            [
				'field' => 'gender',
				'label'	=> 'Gender',
				'rules' => 'required'
			],
            [
				'field' => 'date_of_birth',
				'label'	=> 'Date Of Birth',
				'rules' => 'required'
			],
            [
				'field' => 'place_of_birth',
				'label'	=> 'Place Of Birth',
				'rules' => 'required'
			],
            [
				'field' => 'made',
				'label'	=> 'Creator Who Made',
				'rules' => 'required'
			]
        ]);
        
        $input_data = [
            'name' => $name,
            'address' => $address,
            'image' => $image,
            'place_of_birth' => $place_of_birth,
            'date_of_birth' => $date_of_birth,
            'gender' => $gender,
            'religion' => $religion,
            'citizenship' => $citizenship,
            'blood_type' => $blood_type,
            'email' => $email,
            'phone_number' => $phone_number,
            'made' => $made
        ];

        if ($this->form_validation->run() === FALSE) {
            // $this->load->view('creator/new', $data);
            $errors = validation_errors(NULL, NULL);
            echo json_encode(['errors' => $errors]);
        } else {
            $input_status = $this->creator_data_input_transaction($input_data);
            if ($input_status['is_error'] === FALSE) {
                // redirect('');
                echo json_encode(['success' => "Record Added Successfully"]);
            } else {
                // $this->load->view('creator/new', $data);
                echo json_encode(['errors' => $input_status['errors']]);
            }
            
        }
    }

    public function edit($id) {
        $data['page_resource'] = parent::page_resources();
        $creators = $this->creator_m->detail($id)->row();
        $data['creator'] = [
            'id_creator'        => NULL !== $creators->id_creator ? $creators->id_creator : NULL,
            'name'              => NULL !== $creators->name ? $creators->name : NULL,
            'address'           => NULL !== $creators->address ? $creators->address : NULL,
            'place_of_birth'    => NULL !== $creators->place_of_birth ? $creators->place_of_birth : NULL,
            'date_of_birth'     => NULL !== $creators->date_of_birth ? $creators->date_of_birth : NULL,
            'gender'            => NULL !== $creators->gender ? $creators->gender : NULL,
            'religion'          => NULL !== $creators->religion ? $creators->religion : NULL,
            'citizenship'       => NULL !== $creators->citizenship ? $creators->citizenship : NULL,
            'blood_type'        => NULL !== $creators->blood_type ? $creators->blood_type : NULL,
            'email'             => NULL !== $creators->email ? $creators->email : NULL,
            'phone_number'      => NULL !== $creators->phone_number ? $creators->phone_number : NULL,
            'made'              => NULL !== $creators->made ? $creators->made : NULL,
            'image'             => NULL !== $creators->image ? $creators->image : NULL
        ];
        $data['creator'] = (object) $data['creator'];
        $this->load->view('creator/edit', $data);
    }

    public function update() {
        // $data['page_resource'] = parent::page_resources();
        $id_creator     = $this->input->post('id_creator');
        $name           = $this->input->post('name');
        $date_of_birth  = $this->input->post('date_of_birth');
        $place_of_birth = $this->input->post('place_of_birth');
        $phone_number   = $this->input->post('phone_number');
        $gender         = $this->input->post('gender');
        $religion       = $this->input->post('religion');
        $blood_type     = $this->input->post('blood_type');
        $citizenship    = $this->input->post('citizenship');
        $address        = $this->input->post('address');
        $email          = $this->input->post('email');
        $image          = $this->input->post('image');
        $made           = $this->input->post('made');

        $this->form_validation->set_rules([
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[2]|max_length[40]|alpha'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim|min_length[4]'
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
            ],
            [
				'field' => 'blood_type',
				'label'	=> 'Blood Type',
				'rules' => 'required'
			],
            [
				'field' => 'religion',
				'label'	=> 'Religion',
				'rules' => 'required'
			],
            [
				'field' => 'citizenship',
				'label'	=> 'Citizenship',
				'rules' => 'required'
			],
            [
				'field' => 'gender',
				'label'	=> 'Gender',
				'rules' => 'required'
			],
            [
				'field' => 'date_of_birth',
				'label'	=> 'Date Of Birth',
				'rules' => 'required'
			],
            [
				'field' => 'place_of_birth',
				'label'	=> 'Place Of Birth',
				'rules' => 'required'
			],
            [
				'field' => 'made',
				'label'	=> 'Creator Who Made',
				'rules' => 'required'
			]
        ]);
        
        $input_data = [
            'id_creator' => $id_creator,
            'name' => $name,
            'address' => $address,
            'image' => $image,
            'place_of_birth' => $place_of_birth,
            'date_of_birth' => $date_of_birth,
            'gender' => $gender,
            'religion' => $religion,
            'citizenship' => $citizenship,
            'blood_type' => $blood_type,
            'email' => $email,
            'phone_number' => $phone_number,
            'made' => $made
        ];
        
        if ($this->form_validation->run() === FALSE) {
            // $this->load->view('creator/new', $data);
            $errors = validation_errors(NULL, NULL);
            echo json_encode(['errors' => $errors]);
        } else {
            $image = $this->creator_m->detail($input_data['id_creator'])->row();
            $input_status = $this->creator_data_update_transaction($input_data);
            if ($input_status['is_error'] === FALSE) {
                // redirect('');
                echo json_encode(['success' => "Record Updated Successfully", "new_image" => $input_status['new_image']]);
            } else {
                // $this->load->view('creator/new', $data);
                echo json_encode(['errors' => $input_status['errors']]);
            }
        }
    }

    public function delete($id) {
        $id = $this->input->post("id");
        $db_result = $this->creator_m->delete(['id_creator' => $id]);
        if ($db_result) {
            echo json_encode(['success' => "Record Deleted Successfully"]);
        } else {
            $code = $this->creator_m->get_error()['code'];
            $error_messages = [
                1451 => "It is a PARENT of a sort of data."
            ];
            echo json_encode(['errors' => "Record Failed To Deleted! " .$error_messages[$code]]);
        }
    }

    public function detail($id) {
        $data['page_resource'] = parent::page_resources();
        $data['creator'] = $this->creator_m->detail($id)->row();
        $this->load->view('creator/detail', $data);
    }

    public function list_() {
        $data['page_resource'] = parent::page_resources();
        $data['creators'] = $this->creator_m->all()->result();
        $this->load->view('creator/list', $data);
    }

    private function photo_upload_config() {
        // photo configuration
        $new_file_name                  = "c_".time()."_".$this->session->userdata('id');
        $config['upload_path']          = 'storage/images/creator_photo';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $new_file_name;
        $this->load->library('upload', $config);
    }

    private function creator_data_input_transaction($data) {
        $this->photo_upload_config();
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            return [
                'is_error' => TRUE,
                'errors' => $error
            ];
        }else{
            $data['image'] = $this->upload->data()['orig_name'];
            $this->creator_m->insert($data);
            return [
                'is_error' => FALSE
            ];
        }
    }

    private function creator_data_update_transaction($data) {
        $this->photo_upload_config();
        $image = $this->creator_m->detail($data['id_creator'])->row()->image;
        $where = ['id_creator' => $data['id_creator']];
        if (!$this->upload->do_upload('image') && NULL === $image){
            $error = $this->upload->display_errors();
            return [
                'is_error' => TRUE,
                'errors' => $error
            ];
        }else{
            $data['image'] = "" != $this->upload->data()['orig_name'] ? $this->upload->data()['orig_name'] : $image;
            unset($data['id_creator']);
            $this->creator_m->update($data, $where);
            return [
                'is_error' => FALSE,
                'new_image' => "" != $this->upload->data()['orig_name'] ? $this->upload->data()['orig_name'] : $image
            ];
        }
    }

}
