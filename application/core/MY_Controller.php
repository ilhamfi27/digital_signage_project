<?php
class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->migration_check();
    }
    
    protected function session_needed_except($methods = NULL) {
        $methods = explode("|", $methods);
        $method_used = $this->router->fetch_method();
        $actor_role = $this->session->userdata('status');
        if (!$this->session->status && !in_array($method_used, $methods)) {
            redirect('auth/login/', 'refresh');
        }
    }

    protected function these_method_for($methods = NULL, $actors = NULL) {
        $methods = explode("|", $methods);
        $actors = explode("|", $actors);
        $method_used = $this->router->fetch_method();
        $actor_role = $this->session->userdata('level');
        if(in_array($method_used, $methods) && !in_array($actor_role, $actors)){
            redirect('dashboard/');
        }
    }

    protected function email_config() {
        return [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'digitalsignage.lab.si@smtp.gmail.com',
            'smtp_pass' => 'sinergibangunnegeri',
            'smtp_port' => '465',
            'smtp_crypto' => 'ssl',
            'charset'   => 'iso-8859-1',
            'mailtype' => 'html',
            'newline' => '\r\n'
        ];
    }

    protected function local_timestamp() {
        date_default_timezone_set("Asia/Jakarta");
        return date('Y-m-d h:i:s');
    }

    protected function page_resources($add_data = NULL) {
        $this->load->model("user_data_model");
        $this->load->model("user_model");

        $user_identity = $this->user_data_model->detail($this->session->id)->row();
        $user_base_data = $this->user_model->detail($this->session->id)->row();

        $public_identity = !empty($user_identity) ? $user_identity->first_name . " " . $user_identity->last_name : $user_base_data->username;
        $profile = [
            'joined' => $user_base_data->verification_sent_date,
            'public_identity' => $public_identity,
            'avatar' => !empty($user_identity) ? $user_identity->avatar : 'user-default-avatar.jpg'
        ];
        $data['user_data'] = (object) $profile;
        $data['app_data'] = $add_data;
        return [
            'meta' => $this->load->view('resources/_meta', NULL, TRUE),
            'admin_header' => $this->load->view('resources/_admin_header', $data, TRUE),
            'admin_sidebar' => $this->load->view('resources/_admin_sidebar', $data, TRUE),
            'admin_footer' => $this->load->view('resources/_admin_footer', $data, TRUE),
            'admin_scripts' => $this->load->view('resources/_admin_scripts', NULL, TRUE)
        ];
    }
    
    protected function inside_dir(){
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

    private function migration_check() {
        if(ENVIRONMENT == "development"){
            $this->load->model('migration_model', 'mg');
            $now_class = $this->router->fetch_class();
            $latest_migrated_version = $this->mg
                                             ->get_latest_migrated_version()
                                             ->result()[0];
            $files = $this->inside_dir();
            $latest_migration_version = end($files)['version'];
            if($latest_migrated_version != $latest_migration_version && $now_class != "migrate") {
                $this->session->set_flashdata("migration_first", "There is <strong>Pending</strong> migration. Migrate it First!");
                redirect('migrate/');
            }
        }
    }
}
