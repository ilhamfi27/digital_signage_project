<?php

	class modellayout extends CI_Model{
		
		function ambil_data(){
			return $this->db->get('layout');
		}
		function input_data($data){
			$this->db->insert('layout',$data);
		}
		function hapus_data($where,$data){
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