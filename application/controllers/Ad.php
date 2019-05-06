<?php
class Ad extends MY_Controller {
    public function __construct() {
        parent::__construct();
        parent::session_needed_except();
        parent::these_method_for("new","admin");
        $this->load->model('ad_model', 'ad_m');
        $this->load->model('content_model', 'content_m');
        $this->load->model('content_category_model', 'content_category_m');
    }

    public function new_() {
        $data['content_categories'] = $this->content_category_m->all()->result();
        $data['page_resource'] = parent::page_resources();
        $this->load->view('ad/new', $data);
    }

    public function insert() {
        $subject = $this->input->post("subject");
        $description = $this->input->post("description");
        $content_category = $this->input->post("content_category");
        $this->ad_photo_upload_config();
        if (!$this->upload->do_upload('file')) {
            $error["error_messages"] = $this->upload->display_errors();
        } else {
            $ad_data = [
                'description' => $description,
                'status' => "F",
                'subject' => $subject
            ];
    
            $content_data = [
                'id_content_category' => $content_category,
                'description' => $description,
                'date' => date("Y-m-d"),
                'subject' => $subject,
                'file' => $this->upload->data()['orig_name'],
                'user_id' => $this->session->userdata("id")
            ];
            $result_ad = $this->ad_m->insert($ad_data);
            $result_content = $this->content_m->insert($content_data);
            if($result_ad && $result_content){
                redirect("ad/list_");
            } else {
                redirect("ad/new");
            }
        }

    }

    public function deactivate($id) {
        # code...
    }

    public function detail($id) {
        # code...
    }

    public function delete($id) {
        # code...
    }

    public function list_() {
        $data['page_resource'] = parent::page_resources();
        $data['ads'] = $this->ad_m->all()->result();
        $this->load->view("ad/list",$data);
    }

    private function ad_photo_upload_config() {
        // photo configuration
        $user_id = $this->session->userdata("id");
        $new_file_name                  = "ad_".time()."_".md5($user_id);
        $config['upload_path']          = "storage/images/content/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $new_file_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }
}
