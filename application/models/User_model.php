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

}
