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
		function edit_content($table,$where){
			return $this->db->get_where($table,$where);
		}
		function update_content($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		//Pagination
		// function paging_halaman($number,$offset){
  //           return $query = $this->db->get('content',$number,$offset)->result();       
  //       }
 
  //       function paging(){
  //       return $this->db->get('content')->num_rows();
  //       }
		
		//Seacrh
		// function search($keyword){
  //           $this->db->like('id',$keyword);
  //           $this->db->or_like('subject',$keyword);
  //           $this->db->or_like('date',$keyword);
  //           $this->db->or_like('category',$keyword);
  //           $this->db->or_like('description',$keyword);
  //           $query=$this->db->get('content');
  //           return $query->result();
  //       }


        public function search($keyword){
			$this->db->select('id','date','category','subject','description');
			$this->db->from('content');
			$this->db->like('id',$keyword);
			$this->db->or_like('subject',$keyword);
            $this->db->or_like('date',$keyword);
            $this->db->or_like('category',$keyword);
            $this->db->or_like('description',$keyword);
			return $this->db->get()->result();
		}
	}