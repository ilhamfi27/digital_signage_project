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


		function ambil_layoutcontent($id = null){
			if ($id !== null) {
				return $this->db->get_where('cl', ['id_layout' => $id]);
			}
			return $this->db->get('cl');
		}
		function input_layoutcontent($data){
			$this->db->insert('cl',$data);
		}
		function hapus_layoutcontent($where,$data){
			$this->db->where($where);
			$this->db->delete($data);
		}
		function edit_layoutcontent($where,$data){
			return $this->db->get_where($data,$where);
		}
		function update_layoutcontent($where,$data,$table){
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

		public function finall($id_layout, $id_user)
		{
			$this->db->select('cl.*, content.*');
			$this->db->join('content', 'content.id_content = cl.id_content');
			$this->db->join('layout', 'layout.id_layout = cl.id_layout');
			return $this->db->get_where('cl', ['layout.id_layout' => $id_layout, 'content.user_id' => $id_user]);
		}
	}