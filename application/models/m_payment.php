<?php 


class m_payment extends CI_Model
{
	
	function tampil()
	{
		$this->db->select("payment.id AS id,payment.nama AS nama,periode_pembayaran.periode AS metode_pembayaran")
					->from("payment")
					->join("periode_pembayaran", "payment.metode_pembayaran = periode_pembayaran.id");
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
		return $this->db->query('DELETE FROM `'.$table.'` WHERE id = '.$id);
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