<?php  
	
	class Add_on_model extends CI_Model{
		private $table ="addon";
		public function __construct(){
			parent::__construct();
		}
		
		function insert_add_on($data){
			$this->db->insert('add_ons',$data);
			return $this->db->affected_rows();
		}
		function delete_add_on($where){
			$this->db->where($where);
			$this->db->delete('add_ons');
			return $this->db->affected_rows();
		}
		public function all(){
        return $this->db->get($add_ons);
    	}
    	public function details($id){
    		return $this->db->get_where($this->table,$id);	
    	}
    	public function update($data,$where){
    		$this->db->where($where);
    		$this->db->update($this->table,$data);
    	}

	}

?>