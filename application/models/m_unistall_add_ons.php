<?php 


class m_unistall_add_ons extends CI_Model
{
	// public $id = 'id_billing';
	private $table = 'plugins';
	private $table2 = 'billing';
	function tampil()
	{
		$id_user = $this->session->id;
		return $this->db->where("id_plugin IN (SELECT id_package FROM billing WHERE user_id = $id_user)")->get('plugins');

	}
	function hapus($id,$table){
		$this->db->where($where);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    function hapus_billing($id){
    	
		return $this->db->query('DELETE FROM `billing` WHERE user_id = ?', [$id]);
        
		
	}
}
