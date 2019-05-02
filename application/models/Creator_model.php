<?php  
class Creator_model extends CI_Model{
    private $table ="creators";
    public function __construct(){
        parent::__construct();
    }
    
    public function insert($data){
        $this->db->insert($this->table,$data);
        return $this->db->affected_rows();
    }

    public function delete($where){
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where($where);
        $result = $this->db->delete($this->table);

        $this->db->db_debug = $db_debug; //restore setting
        return $result;
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

    public function get_error(){
        return $this->db->error();
    }
}
