<?php  
class Media_model extends CI_Model{
    private $table ="media";
    public function __construct(){
        parent::__construct();
    }
    
    public function insert($data){
        return $this->db->insert_batch($this->table,$data);
    }

    public function delete($where){
        $this->db->where($where);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function all(){
        return $this->db->get($this->table);
    }

    public function details($id){
        return $this->db->get_where($this->table,['id' => $id]);	
    }

    public function update($data,$where){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function media_for($id){
        return $this->db->get_where($this->table,['media_for' => $id]);	
    }

    public function new_last_id(){
        return $this->db->insert_id();
    }
}
