<?php
class User_model extends CI_Model {
    private $table = 'users';
    public function __construct() {
        parent::__construct();
    }

    public function user_existence($data){
        $result = $this->db->get_where($this->table, $data);
        return $result;
    }

    public function insert_user($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

}
