<?php  
class Add_on_model_new extends CI_Model{
	private $table ="add_ons";
	public function __construct(){
		parent::__construct();
	}
	
	function insert_add_on($data){
		$this->db->insert('add_ons',$data);
		return $this->db->affected_rows();
	}

	function insert_plugin($data){
		$this->db->insert('plugins',$data);
		return $this->db->affected_rows();
	}
	
	function delete_plugin($where){
		$this->db->where($where);
		$this->db->delete('add_ons');
		return $this->db->affected_rows();
	}
	public function all(){
    return $this->db->query('SELECT add_ons.price, plugins.uploaded, plugins.description, plugins.title, plugins.ratings, plugins.date, creator.name
		from add_ons JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
		JOIN creator on creator.id_creator = plugins.id_creator');
					}
	public function details($id){
		// return $this->db->get_where($this->table,$id);
		return $this->db->get_where($this->table,['id'=>$id]);	
	}
	public function update($data,$where){
		$this->db->where('id', $where);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}

}

?>
