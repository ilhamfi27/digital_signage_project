<?php
class Dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        parent::session_needed_except();
        $this->load->model("user_data_model", "user_data_m");
        $this->load->model("user_model", "user_m");
    }

    public function index(){
        $data['page_resource'] = parent::page_resources();
        $this->load->view('dashboard/index', $data);
    }

    public function user_profile(){
        $user_db_data = $this->user_data_m->detail($this->session->userdata('id'))->row();
        $user_base_db_data = $this->user_m->detail($this->session->userdata('id'))->row();
        $user_data = [
            'user_id'       => isset($user_db_data->user_id) ? $user_db_data->user_id : NULL,
            'username'      => isset($user_base_db_data->username) ? $user_base_db_data->username : NULL,
            'first_name'    => isset($user_db_data->first_name) ? $user_db_data->first_name : NULL,
            'last_name'     => isset($user_db_data->last_name) ? $user_db_data->last_name : NULL,
            'birth_date'    => isset($user_db_data->birth_date) ? $user_db_data->birth_date : NULL,
            'gender'        => isset($user_db_data->gender) ? $user_db_data->gender : NULL,
            'avatar'        => isset($user_db_data->avatar) ? $user_db_data->avatar : NULL
        ];
        $user_data = (object) $user_data;
        $data['page_resource'] = parent::page_resources();
        $data['user_data'] = $user_data;
        $this->load->view('dashboard/user_profile', $data);
    }

    public function insert_data_user() {
        $first_name                 = $this->input->post('first_name');
        $last_name                  = $this->input->post('last_name');
        $birth_date                 = $this->input->post('birth_date');
        $gender                     = $this->input->post('gender');

        $password_verification      = $this->input->post('password_verification');
        
        $this->photo_upload_config();
        
        $this->form_validation->set_rules([
            [
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'required|trim|min_length[4]|max_length[20]'
            ],
            [
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'required|trim|min_length[4]|max_length[20]'
            ],
            [
                'field' => 'birth_date',
                'label' => 'Birth Date',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ],
            [
                'field' => 'password_verification',
                'label' => 'Password Verification',
                'rules' => 'required'
            ]
        ]);

        $user_encrypted_password = $this->user_m->detail($this->session->userdata('id'))->row()->password;
        $data['user_data'] = $this->user_data_m->detail($this->session->userdata('id'))->row();
        
        $new_profile_data = [
            'user_id' => $this->session->userdata('id'),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth_date' => $birth_date,
            'gender' => $gender//,
            // 'avatar' => "" !== $this->upload->data()['orig_name'] ? $this->upload->data()['orig_name'] : $data['user_data']->avatar
        ];

        if ($this->form_validation->run() === FALSE) {
            $errors = validation_errors(NULL, NULL);
            echo json_encode(['errors' => $errors]);
        } else {
            $data_needed = [
                'user_encrypted_password' => $user_encrypted_password,
                'password_verification' => md5($password_verification),
                'avatar' => $data['user_data']->avatar,
                'page_data' => $data
            ];
            $result = $this->user_data_transaction($data_needed, $new_profile_data);
            // if ($result['is_error'] === FALSE) {
            //     echo json_encode([
            //         'success' => "Record Added Successfully",
            //         'new_image' => $result['new_image']
            //     ]);
            // } else {
            //     echo json_encode(['errors' => $result['errors']]);
            // }
        }
    }

    private function photo_upload_config(){
        // photo configuration
        $new_file_name                  = "p_".time()."_".$this->session->userdata('id');
        $config['upload_path']          = 'storage/images/user_avatar/';
        // $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['allowed_types']        = 'gif';
        $config['file_name']            = $new_file_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }

    private function user_data_transaction($data_needed, $new_profile_data){
        if ($data_needed['user_encrypted_password'] === $data_needed['password_verification']) {
            $photo_upload_status = $this->upload->do_upload('photo');
            $photo_upload_errors = $this->upload->display_errors(NULL,NULL);
            if (!$photo_upload_status && NULL === $data_needed['avatar'] && "" != $photo_upload_errors){
                // return [
                //     'is_error' => TRUE,
                //     'errors' => $photo_upload_errors
                // ];
                print_r($photo_upload_errors);
                echo "1";
            } else if (!$photo_upload_status && NULL !== $data_needed['avatar'] && "" != $photo_upload_errors){
                // return [
                //     'is_error' => TRUE,
                //     'errors' => $photo_upload_errors
                // ];
                print_r($data_needed['avatar']);
                print_r(NULL !== $data_needed['avatar'] && "" != $photo_upload_errors);
                print_r($photo_upload_errors);
                echo "2";
            } else {
                $user_exist = $this->user_data_m->detail($this->session->userdata('id'))->row();
                $new_profile_data['avatar'] = "" !== $this->upload->data()['orig_name'] ? $this->upload->data()['orig_name'] : $data_needed['avatar'];
                if (!isset($user_exist)) {
                    $db_operation = $this->user_data_m->insert($new_profile_data);
                } else {
                    unset($new_profile_data['user_id']);
                    $db_operation = $this->user_data_m->update($new_profile_data, $this->session->userdata('id'));
                }
                
                // return [
                //     'is_error' => FALSE,
                //     'new_image' => $new_profile_data['avatar']
                // ];
                print_r($photo_upload_errors);
                echo "3";
            }
        } else {
            return [
                'is_error' => TRUE,
                'errors' => 'Incorrect Password Verification'
            ];
        }
    }
}