<?php  
class Add_on_model extends CI_Model{
	private $table ="creator";
	public function __construct(){
		parent::__construct();
	}
	
	function insert_add_on($data){
		$this->db->insert('creator',$data);
		return $this->db->affected_rows();
	}
	function delete_add_on($where){
		$this->db->where($where);
		$this->db->delete('creator');
		return $this->db->affected_rows();
	}
	public function all(){
    return $this->db->get('creator');
	}
	public function details($id){
		return $this->db->get_where($this->table,$id);	
	}
	public function update($data,$where){
		$this->db->where('id', $where);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}

}

?>