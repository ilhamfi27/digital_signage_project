<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migrate extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
        $this->load->model('migration_model', 'mg');
    }

    public function execute($version = NULL) {
        if ($this->is_it_executed($version)) {
            $migration_status = "Migration Success";
        } else {
            $migration_status = show_error($this->migration->error_string());
        }
        $this->index($migration_status);;
    }
    
    public function index($migration_status = NULL) {
        $data['migration_version'] = $this->mg->get_latest_migrated_version()
                                        ->result()[0]
                                        ->version;
        $data['files'] = $this->inside_dir();
        $data['migration_status'] = $migration_status;
        $this->load->view("migration_view", $data);
    }
    
    private function is_it_executed($version = NULL){
        $execute_migration = $version != NULL ? $this->migration->version($version) : $this->migration->latest();
        if ($execute_migration === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function inside_dir(){
        $dir = APPPATH . "migrations";
        $files = array();
        if (is_dir($dir)) {
            if ($d = opendir($dir)) {
                while (($file = readdir($d)) !== FALSE) {
                    if (pathinfo($dir.$file)['extension'] === "php") {
                        $file_name = explode("_",$file);
                        $version = $file_name[0];
                        array_shift($file_name);
                        $files[$version] = implode("_", $file_name);
                    }
                }
                closedir($d);
            }
        }
        return $files;
    }
}
