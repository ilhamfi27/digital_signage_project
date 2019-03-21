<?php  
	
	class Add_on_model extends CI_Model{
		
		function insert_add_on($data){
			$this->db->insert('add_ons',$data);
			return $this->db->affected_rows();
		}
	}

?>