<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Devices extends CI_Model{

	function get_devices(){
		$this->db->select("*");
		$this->db->where("status","active");
		$query = $this->db->get("devices");

		return $query->result();
	}

	function modify($data){
		$this->db->where("id",$data['ip']);
		$this->db->update("devices");
	}

	function new_device($data){
		$this->db->insert("devices",$data);
	}

	function obsolete($id){

		$this->db->where("id",$id);
		$this->db->update("devices",array("status"=>"obsolete"));
	}
}