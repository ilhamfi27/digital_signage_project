<?php  
class Add_on_creator_model_new extends CI_Model{
	private $table ="creator";
	public function __construct(){
		parent::__construct();
	}
	
	function insert_creator($data){
		$this->db->insert('creator',$data);
		return $this->db->affected_rows();
	}
	function delete_creator($where){
		$this->db->where($where);
		$this->db->delete('creator');
		return $this->db->affected_rows();
	}
	public function all(){
    return $this->db->get('creator');
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