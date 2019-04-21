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
        $this->load->model('media_model','media_m');
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

        $data['page_resource'] = parent::page_resources();
        $title 		    = $this->input->post('title');
        $description 	= $this->input->post('description');
        $category 	    = $this->input->post('category');
        $creator 	    = $this->input->post('creator');

        // var_dump($this->input->post());
        // echo "<br>";
        // var_dump($_FILES['screenshots']);

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
        	$this->load->view('theme/new',$data);
        } else {
            $this->theme_photo_upload_config($title);
            if (!$this->upload->do_upload('icon')) {
                $error["error_messages"] = $this->upload->display_errors();
            } else {
                $new_theme_data = [
                    'uploaded_date' => parent::local_timestamp(),
                    'title' => $title,
                    'description' => $description,
                    'photo_icon' => $this->upload->data()['orig_name'],
                    'id_creator' => $creator,
                    'id_category' => $category
                ];
                if($this->plugin_m->insert($new_theme_data) > 0){
                    $id = $this->plugin_m->new_last_id();
    
                    
                    $title = implode("-",explode(" ", strtolower($title)));
                    $upload_path = "storage/images/screenshot/" . $title . "/";
                    (!is_dir($upload_path)) ? mkdir($upload_path, 0777, TRUE) : NULL;
                    
                    foreach ($_FILES['screenshots']['name'] as $key => $name) {
                        echo $name . " " . $key . "<br>";
                        $this->screenshots_upload_config($title, $id, $upload_path, $key);
                        $_FILES['screenshot']['name']         = $name;
                        $_FILES['screenshot']['type']         = $_FILES['screenshots']['type'][$key];
                        $_FILES['screenshot']['tmp_name']     = $_FILES['screenshots']['tmp_name'][$key];
                        $_FILES['screenshot']['error']        = $_FILES['screenshots']['error'][$key];
                        $_FILES['screenshot']['size']         = $_FILES['screenshots']['size'][$key];
    
                        if(!$this->upload->do_upload('screenshot')){
                            $error["error_messages"] = $this->upload->display_errors() . " -> " . $key;
                        } else {
                            $upload_data[$key]['file_name'] = $this->upload->data()['orig_name'];
                            $upload_data[$key]['url'] = $upload_path;
                            $upload_data[$key]['type'] = "image";
                            $upload_data[$key]['media_for'] = $id;
                        }
                    }
                    if (!empty($upload_data)) {
                        $result = $this->media_m->insert($upload_data);
                        $result ? redirect("theme/detail/".$id) : $this->load->view('theme/new',$data);;
                    } else {
                        $this->load->view('theme/new',$data);
                    }
                }
            }
        }
    }
    
    public function detail($id){
        $data['page_resource'] = parent::page_resources();
        $data['theme'] = $this->plugin_m->full_detail($id)->row();
        /**
         * full_detail returns a single row
         * title
         * description
         * rating
         * category_name
         * creator_name
         * uploaded_date
         */
        $data['screenshots'] = $this->media_m->media_for($id)->result();
        /**
         * media_for returns multiple row
         * file_name
         * url
         * type
         */
        $this->load->view('theme/detail', $data);
    }

    public function list(){
        $data['page_resource'] = parent::page_resources();
        $data['detailed_data'] = $this->plugin_m->detailed_plugin()->result();
        $this->load->view('theme/list', $data);
    }

    private function screenshots_upload_config($title, $id, $upload_path, $img_queue = NULL){
        // screenshots upload configuration
        $new_file_name                  = "screenshot_".time()."_".$id."_".$img_queue;
        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $new_file_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }

    private function theme_photo_upload_config($title){
        // photo configuration
        $new_file_name                  = "thm_".time()."_".md5($title);
        $config['upload_path']          = "storage/images/theme_photo/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $new_file_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }
}