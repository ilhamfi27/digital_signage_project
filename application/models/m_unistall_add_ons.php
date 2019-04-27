<?php 


class m_unistall_add_ons extends CI_Model
{
	private $table = 'plugins';
	function tampil()
	{
		return $this->db->get();

	}
	function input_data_payment($data)
	{
		$this->db->insert('periode_pembayaran',$data);
	}
	function tampilPayment()
	{
		return $this->db->get('periode_pembayaran');
	}
	function input_data($data)
	{
		$this->db->insert('detail_payment',$data);
	}
	function hapus($id,$table){
		$this->db->where($where);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
	}
	function edit_data($where,$data){		
	return $this->db->get_where($data,$where);
	}
	function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
	}
}

 ?>