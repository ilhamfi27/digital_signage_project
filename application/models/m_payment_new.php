<?php 


class m_payment_new extends CI_Model
{
	
	function tampil()
	{

		// $this->db->select("payment.id AS id,payment.nama AS nama,periode_pembayaran.periode AS metode_pembayaran")
		// 			->from("payment")
		// 			->join("periode_pembayaran", "payment.metode_pembayaran = periode_pembayaran.id");
		return $this->db->get('payment_code');

	}
	function input_data_payment($data)
	{
		$this->db->insert('periode_pembayaran',$data);
	}
	function tampilPayment()
	{
		return $this->db->get('periode_pembayaran');
	}
	function tampilBilling($id)
	{
		$this->db->join('transaction','billing.id_billing=transaction.id_billing');
		$this->db->join('add_ons','billing.id_package=add_ons.id_plugin');
		$this->db->join('plugins','add_ons.id_plugin=plugins.id_plugin');
		$this->db->where('user_id',$id);
		return $this->db->get('billing');

	}
	function input_data($data)
	{
		$this->db->insert('payment_code',$data);
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

	public function update_status($id)
	{
		$this->db->set(['status' => 1]);
	        	$this->db->where('id_billing', $id);
	        	return $this->db->update('billing');
	}
}

 ?>