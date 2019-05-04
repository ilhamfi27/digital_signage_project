<?php 


class m_unistall_add_ons extends CI_Model
{
	private $table = 'plugins';
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
}
