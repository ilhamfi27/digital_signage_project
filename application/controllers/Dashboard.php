<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['template'] = $this->html_resources();
        $this->load->view('dashboard/index', $data);
    }

    private function html_resources(){
        $data['head_resource'] = $this->load->view('resources/head_resource', NULL, TRUE);
        $data['navbar'] = $this->load->view('resources/navbar_admin', NULL, TRUE);
        return $data;
    }
}
