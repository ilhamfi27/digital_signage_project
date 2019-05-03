<?php  
class Add_on_creator_model_new extends CI_Model{
	private $table ="creators";
	public function __construct(){
		parent::__construct();
	}
	
	function insert_creator($data){
		$this->db->insert($this->table,$data);
		return $this->db->affected_rows();
	}
	function delete_creator($where){
		$this->db->where($where);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
	public function all(){
    return $this->db->get($this->table);
	}
	public function details($id){
		return $this->db->get_where($this->table,['id_creator' => $id]);	
	}
	public function update_creator($data,$where){
		$this->db->where('id_creator', $where);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}

}

?>