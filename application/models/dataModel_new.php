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
		$this->db->join('plugins', 'plugins.id_plugin = add_ons.id_plugin');
		return $this->db->get('add_ons');
	}
	function tampil_admin()
	{
		return $this->db->query('CALL p_view_admin');
	}
	function input_data($data)
	{
		$this->db->insert('billing',$data);
	}
	function input_data_transaksi($data)
	{
		$this->db->insert('transaction',$data);
	}
	function hapus($where,$data){
		$this->db->where($where);
		$this->db->delete($data);
		
	}
	function edit_billing($where,$data){		
	return $this->db->get_where($data,$where);
	}
	function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
	}
	public function update_billing($data, $id)
	{
		$name = $data['name'];
		$duration_first = $data['duration_first'];
		$duration_last = $data['duration_last'];
		$email = $data['email'];
		$method = $data['method'];
		$id_package = $data['id_package'];
		$kode = $data['kode'];
		$this->db->query("UPDATE `billing` JOIN transaction ON transaction.id_billing = billing.id_billing SET `name` = '$name', `duration_first` = '$duration_last', `duration_last` = '$duration_last', `email` = '$email', `kode` = '$kode', `method` = '$method', `id_package` = '$id_package', `user_id` = '$id' WHERE `user_id` = '$id'");
	}

	public function has_bought($user_id)	{
		return $this->db->query(
			"SELECT *
			FROM billing b
			JOIN users u ON u.user_id = b.user_id
			WHERE `status` = 1 
			AND duration_last > CURRENT_DATE
			AND b.user_id = " . $user_id
		);
	}
	
}

 ?>