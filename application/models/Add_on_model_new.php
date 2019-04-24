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
	public function all($id = null){
		if ($id !== null) {
			return $this->db->query("SELECT add_ons.price, plugins.uploaded, plugins.description, plugins.title, plugins.ratings, plugins.date, creator.name, plugins.id_plugin, plugins.id_creator
		from add_ons JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
		JOIN creator on creator.id_creator = plugins.id_creator WHERE plugins.id_plugin = '$id'");
		}
    return $this->db->query('SELECT add_ons.price, plugins.uploaded, plugins.description, plugins.title, plugins.ratings, plugins.date, creator.name, plugins.id_plugin, plugins.id_creator
		from add_ons JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
		JOIN creator on creator.id_creator = plugins.id_creator');
					}
	public function details($id){
	return $this->db->query('SELECT plugins.title, creator.name, plugins.date, plugins.ratings, add_ons.price, plugins.uploaded
							FROM plugins JOIN creator ON plugins.id_creator = creator.id_creator 
							JOIN add_ons on add_ons.id_plugin = plugins.id_plugin');
		
		return $this->db->get_where($this->table,['id_plugin'=>$id]);	
	}
	public function update($data,$id){
		$price = $data['price'];
		$uploaded = $data['uploaded'];
		$description = $data['description'];
		$title = $data['title'];
		$ratings = $data['ratings'];
		$date = $data['date'];
		$name = $data['creator'];
		$upload = $uploaded != "" ? "plugins.uploaded =$uploaded ," : "";
		$this->db->query("UPDATE add_ons JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
		JOIN creator on creator.id_creator = plugins.id_creator SET add_ons.price = '$price', $upload  plugins.description ='$description', plugins.title ='$title', plugins.ratings= '$ratings', plugins.date ='$date', plugins.id_creator ='$name' WHERE plugins.id_plugin = '$id'");
		return $this->db->affected_rows();
	}

}

?>
