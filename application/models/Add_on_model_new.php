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
		return $this->db->query('
			SELECT 
				add_ons.price, 
				plugins.photo_icon, 
				plugins.description, 
				plugins.title, 
				plugins.rating, 
				tgl(plugins.uploaded_date) as date, 
				creators.name, 
				plugins.id_plugin, 
				plugins.id_creator
			from add_ons 
			JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
			JOIN creators on creators.id_creator = plugins.id_creator
		');
	}
	public function details($id){
		$this->db->join('creators', 'creators.id_creator = plugins.id_creator');
		$this->db->join('add_ons', 'add_ons.id_plugin = plugins.id_plugin');
		return $this->db->get_where('plugins',['plugins.id_plugin'=>$id]);	
	}

    public function update($data,$where){
        $this->db->where(['id_plugin' => $where]);
        $this->db->update($this->table,$data);
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

	public function available_for($id_user){
		 return $this->db->query("SELECT
			ad.id_plugin,
		    price,
		    title,
		    photo_icon,
		    description,
		    (
		        SELECT
		            (
		                CASE
		                    WHEN b.duration_last > CURRENT_DATE THEN TRUE
		                    ELSE FALSE
		                END
		            ) add_on_avaliability
		        FROM add_ons a
		        LEFT JOIN billing b ON b.id_package = a.id_plugin
		        LEFT JOIN users u ON u.user_id = b.user_id
		        LEFT JOIN plugins p ON p.id_plugin = a.id_plugin
		        WHERE a.id_plugin = ad.id_plugin AND u.user_id = ?
		        LIMIT 1
		    ) AS add_on_avaliability
		FROM add_ons ad
		LEFT JOIN plugins p ON p.id_plugin = ad.id_plugin", [$id_user]);
	}

}

?>
