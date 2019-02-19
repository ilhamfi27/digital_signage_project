<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migrate extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
    }

    public function execute($version = NULL) {
        $execute_migration = $version != NULL ? $this->migration->version($version) : $this->migration->latest();
        if ($execute_migration === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migration Success";
        }
    }
}
