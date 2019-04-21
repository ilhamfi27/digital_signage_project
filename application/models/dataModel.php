<?php 


class dataModel extends CI_Model
{
	
	function tampil()
	{
		// return $this->db->get('payment');
		$this->db->select("*")->from("payment")->join("periode_pembayaran", "payment.metode_pembayaran = periode_pembayaran.id");
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
		$this->db->insert('payment',$data);
	}
	function hapus($where,$data){
		$this->db->where($where);
		$this->db->delete($data);
		
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