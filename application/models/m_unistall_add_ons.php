<?php 


class m_unistall_add_ons extends CI_Model
{
	private $table = 'plugins';
	function tampil()
	{
		return $this->db->get('plugins');

	}
	function hapus($id,$table){
		$this->db->where($where);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
}

 ?>