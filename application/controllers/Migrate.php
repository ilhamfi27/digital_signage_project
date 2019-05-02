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
        $this->index($migration_status);    
    }
    
    public function index($migration_status = NULL) {
        $data['migration_version'] = $this->mg->get_latest_migrated_version()
                                        ->result()[0]
                                        ->version;
        $data['files'] = $this->inside_dir();
        $data['migration_status'] = $migration_status;
        $data['very_early_version'] = $data['files'][0]['version'];
        $data['very_last_version'] = end($data['files'])['version'];
        $this->load->view("migration_views/index", $data);
    }

    public function create_new_migration_file() {
        $new_file_name = $this->input->post("new_migration_file");
        $new_file_name = implode("_",explode(" ",strtolower($new_file_name)));
        if($this->make_new_file($new_file_name)){
            redirect("migrate/");
        } else {
            redirect("migrate/");
        }
    }

    private function make_new_file($file_name) {
        $folder = APPPATH.'migrations/';
        date_default_timezone_set('Asia/Jakarta');
        $timestamp = date("YmdHis");
        $filename = $folder.$timestamp."_".$file_name.".php";
        if (!file_exists($filename)) {
            (!is_dir($folder)) ? mkdir($folder, 0777, TRUE) : NULL;
            $handle = fopen($filename, 'w+') or die('cannot open the file');
            $resource_file = fopen('application/migration_source_code.txt', "r") or die("Unable to open file!");
            $upper_content = "<?php\nclass Migration_".$file_name." extends CI_Migration {";
            fwrite($handle, $upper_content);
            while(! feof($resource_file))  {
                $result = fgets($resource_file);
                fwrite($handle, $result);
            }
            fclose($resource_file);
            fclose($handle);
        } else {
            echo "the file is exists";
            return FALSE;
        }
        return TRUE;
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
        $index = 0;
        if (is_dir($dir)) {
            if ($d = opendir($dir)) {
                while (($file = readdir($d)) !== FALSE) {
                    if (pathinfo($dir.$file)['extension'] === "php") {
                        $file_name = explode("_",$file);
                        $version = $file_name[0];
                        array_shift($file_name);
                        $files[$index]['version'] = $version;
                        $files[$index]['file_name'] = implode("_", $file_name);
                        $index++;
                    }
                }
                closedir($d);
            }
        }
        return $files;
    }
}
