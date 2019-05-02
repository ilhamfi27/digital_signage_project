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
		$this->db->delete('plugins');
		return $this->db->affected_rows();
	}
	public function all($id = null){
		if ($id !== null) {
		return $this->db->query("call add_ons('$id')");
		// 	return $this->db->query("SELECT add_ons.price, plugins.uploaded, plugins.description, plugins.title, plugins.ratings, plugins.date, creator.name, plugins.id_plugin, plugins.id_creator
		// from add_ons JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
		// JOIN creator on creator.id_creator = plugins.id_creator WHERE plugins.id_plugin = '$id'");
		}
    return $this->db->query('SELECT add_ons.price, plugins.uploaded, plugins.description, plugins.title, plugins.ratings, tgl(plugins.date) as date, creator.name, plugins.id_plugin, plugins.id_creator
		from add_ons JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
		JOIN creator on creator.id_creator = plugins.id_creator');
					}
	public function details($id){
		$this->db->join('creator', 'creator.id_creator = plugins.id_creator');
		$this->db->join('add_ons', 'add_ons.id_plugin = plugins.id_plugin');
		return $this->db->get_where('plugins',['plugins.id_plugin'=>$id]);	
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

	public function tambah_comment($data)
	{
		$this->db->insert('comment', $data);
	}

	public function semua_comment($id)
	{
		$this->db->select('users.username, comment.*');
		$this->db->join('users', 'users.user_id = comment.user_id');
		$this->db->join('plugins', 'plugins.id_plugin = comment.id_plugin');
		return $this->db->get_where('comment', ['plugins.id_plugin' => $id]);
	}

}

?>