<?php

	class modelcontent extends CI_Model{
		
		function ambil_content(){
			return $this->db->get('content');
		}
		function input_content($data){
			$this->db->insert('content',$data);
		}
		function hapus_content($where,$data){
			$this->db->where($where);
			$this->db->delete($data);
		}
		function edit_content($where,$data){
			return $this->db->get_where($data,$where);
		}
		function update_content($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}