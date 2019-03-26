<?php
class User_model extends CI_Model {
    private $table = 'users';
    public function __construct() {
        parent::__construct();
    }

    public function user_existence($data){
        $sql = "
            SELECT 
                * 
            FROM 
                `users` 
            WHERE 
                (`username` = ? 
                OR `email` = ?)
                AND `password` = ?
        ";
        return $this->db->query($sql, [
            $data['user_auth'],
            $data['user_auth'],
            $data['password']
        ]);
    }

    public function insert_user($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
