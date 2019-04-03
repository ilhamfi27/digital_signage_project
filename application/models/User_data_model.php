<?php
class User_data_model extends CI_Model {
    private $table = 'user_data';
    public function __construct() {
        parent::__construct();
    }

    public function detail($id){
        return $this->db->get_where($this->table, ['user_id' => $id]);
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id) {
        $this->db->where('user_id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function db_error_message(){
        return $this->db->_error_message();
    }

    public function db_error_number(){
        return $this->db->_error_number();
    }
}
