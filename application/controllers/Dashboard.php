<?php
class Dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        parent::session_needed_except();
        $this->load->helper('view_partial');
        $this->load->model("user_data_model", "user_data_m");
        $this->load->model("user_model", "user_m");
    }

    public function index(){
        $data['page_resource'] = parent::page_resources();
        $this->load->view('dashboard/index', $data);
    }

    public function user_profile(){
        $user_db_data = $this->user_data_m->detail($this->session->userdata('id'))->row();
        $user_data = [
            'user_id'       => isset($user_db_data->user_id) ? $user_db_data->user_id : NULL,
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
        $data['page_resource'] = parent::page_resources();

        $first_name                 = $this->input->post('first_name');
        $last_name                  = $this->input->post('last_name');
        $birth_date                 = $this->input->post('birth_date');
        $gender                     = $this->input->post('gender');
        $photo                      = $this->input->post('photo');

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

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('dashboard/user_profile', $data);
        } else {
            if ($user_encrypted_password == md5($password_verification)) {
                if ( ! $this->upload->do_upload('photo') && !isset($data['user_data']->avatar)){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('photo_error', $error);
                    $this->load->view('dashboard/user_profile', $data);
                }else{
                    $new_profile_data = [
                        'user_id' => $this->session->userdata('id'),
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'birth_date' => $birth_date,
                        'gender' => $gender,
                        'avatar' => "" !== $this->upload->data()['orig_name'] ? $this->upload->data()['orig_name'] : $data['user_data']->avatar
                    ];
                    $user_exist = $this->user_data_m->detail($this->session->userdata('id'))->row();
                    if (!isset($user_exist)) {
                        $db_operation = $this->user_data_m->insert($new_profile_data);
                    } else {
                        unset($new_profile_data['user_id']);
                        $db_operation = $this->user_data_m->update($new_profile_data, $this->session->userdata('id'));
                    }
                    
                    if($db_operation > 0){
                        redirect('dashboard/user_profile');
                    } else {
                        $this->session->set_flashdata('query_error', $this->user_data_m->db_error_message());
                        $this->session->set_flashdata('query_error_number', $this->user_data_m->db_error_number());
                        redirect('dashboard/user_profile');
                    }
                }
            } else {
                $this->session->set_flashdata('password_verification_wrong', 'Password Verification Wrong');
                redirect('dashboard/user_profile');
            }
        }
    }

    private function photo_upload_config(){
        // photo configuration
        $new_file_name                  = "p_".time()."_".$this->session->userdata('id');
        $config['upload_path']          = 'storage/images/user_avatar/';
		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $new_file_name;
        $this->load->library('upload', $config);
    }
}
