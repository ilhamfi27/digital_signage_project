<?php

	class modellayout_new extends CI_Model{
		
		function ambil_layout($id = null){
			if ($id !== null) {
				return $this->db->get_where('layout', ['id_layout' => $id]);
			}
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



			function ambil_layoutAdmin(){
			return $this->db->get('layout');
		}
		function input_layoutAdmin($data){
			$this->db->insert('layout',$data);
		}
		function hapus_layoutAdmin($where,$data){
			$this->db->where($where);
			$this->db->delete($data);
		}
		function edit_layoutAdmin($where,$data){
			return $this->db->get_where($data,$where);
		}
		function update_layoutAdmin($where,$data,$table){
			$this->db->set($data);
			$this->db->where($where);
			$this->db->update($table);
		}
	}