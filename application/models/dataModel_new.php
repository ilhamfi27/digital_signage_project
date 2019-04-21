<?php 


class dataModel_new extends CI_Model
{
	
	function tampil()
	{
		// return $this->db->get('payment');
		$this->db->select("*")->from("payment")->join("periode_pembayaran", "payment.metode_pembayaran = periode_pembayaran.id");
		return $this->db->get();

	}
	function input_data_payment($data)
	{
		$this->db->insert('package',$data);
	}
	function tampilPayment()
	{
		return $this->db->get('package');
	}
	function input_data($data)
	{
		$this->db->insert('transaction',$data);
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