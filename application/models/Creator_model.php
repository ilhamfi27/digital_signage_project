<?php  
class Creator_model extends CI_Model{
    private $table ="creators";
    public function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->insert($this->table,$data);
        return $this->db->affected_rows();
    }

    function delete($where){
        $this->db->where($where);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    
    public function all(){
        return $this->db->get($this->table);
    }
    
    public function detail($id){
        return $this->db->get_where($this->table,['id' => $id]);	
    }
    
    public function update($data,$where){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }
}
