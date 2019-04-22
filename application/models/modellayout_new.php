<?php

	class modellayout_new extends CI_Model{
		
		function ambil_layout(){
			return $this->db->get('layout');
		}
		function input_layout($data){
			$this->db->insert('layout',$data);
		}
		function hapus_layout($where,$data){
			$this->db->where($where);
			$this->db->delete($data);
		}
		function edit_layout($where,$data){
			return $this->db->get_where($data,$where);
		}
		function update_layout($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}