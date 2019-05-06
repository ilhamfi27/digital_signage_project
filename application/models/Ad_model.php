<?php  
class Ad_model extends CI_Model{
    private $table ="ads";
    public function __construct(){
        parent::__construct();
    }
    
    public function insert($data){
        return $this->db->insert($this->table,$data);
    }
    
    public function delete($where){
        $this->db->where($where);
        return $this->db->delete($this->table);
    }
    
    public function all(){
        return $this->db->get($this->table);
    }
    
    public function detail($id){
        return $this->db->get_where($this->table,$id);	
    }
    
    public function update($data,$where){
        $this->db->where($where);
        return $this->db->update($this->table,$data);
    }

    public function get_error(){
        return $this->db->error();
    }

    public function new_last_id(){
        return $this->db->insert_id();
    }
}
