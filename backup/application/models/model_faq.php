<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_FAQ extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function get_FAQ(){
		$query = $this->db->query("Select * from workarounds");
		return $query->result();
	}

	function get_FAQ_by_id($id){
		$this->db->limit(1);
		$this->db->select('subject,body,id');
		$this->db->where('id',$id);
		$query = $this->db->get('workarounds');

		return $query->result();
	}

	function remove_FAQ($id){
		$this->db->where('id',$id);
		$this->db->delete('workarounds');
	}

	function search($keyword){
		$this->db->limit(20);
		$this->db->like('subject',$keyword);
		$this->db->or_like('tags',$keyword);
		$this->db->or_like('body',$keyword);
		$query = $this->db->get('workarounds');

		return $query->result();
	}

	function add($data){
		$this->db->insert("workarounds",$data);
	}

}