<?php
class Migration_model extends CI_Model {
    private $table = 'migrations';
    public function __construct() {
        parent::__construct();
    }

    public function get_latest_migrated_version(){
        return $this->db->get($this->table);
    }
}
