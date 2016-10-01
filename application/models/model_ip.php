<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Ip extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	/*
	* Use update function to change the IP
	* status to 'ACTIVE' for new assigned IP
	*/
	function new_ip($data){
		$this->db->where("ip",$data['ip']);
		$this->db->update("ip_status",$data);

		$logs = array(
			"log"=>"New IP assignment by <strong>" . $this->session->name . "</strong><br> ip: <strong>" . $data['ip'] . "</strong><br>"
				. "computer name: <strong>" . $data['computername'] . "</strong></br>"
				. "username: <strong>" . $data['username'] . "</strong></br>"
				. "device: <strong>" . $data['device'] . "</strong></br>"
				. "mac address: <strong>" . $data['macaddress'] . "</strong></br>"
				. "department: <strong>" . $data['department'] . "</strong></br>",
			"time"=>date("Y-m-d H:i:s"),
			);
		$this->db->insert("logs",$logs);
	}

	/*
	* Get inactive IP Addresses and display them in
	* dropdown list in new IP Assignment
	*/
	function get_available_ip(){
		$this->db->where("status","inactive");
		$this->db->select("id,ip");
		$query = $this->db->get("ip_status");

		return $query->result();
	}

	function get_active_ip(){
		$this->db->where("status","active");
		$query = $this->db->get("ip_status");

		return $query->result();
	}

	function get_ip($ip){
		$this->db->where("ip",$ip);
		$query = $this->db->get("ip_status");

		return $query->result();
	}

	function disable_ip($ip){
		$this->db->set("status","inactive");
		$this->db->where("ip",$ip);
		$this->db->update("ip_status");
	}

	function edit_assignment($details){
		$this->db->where("ip",$details['ip']);
		$this->db->update("ip_status",$details);
	}

	function getLogs(){
		$query = $this->db->query("Select * from logs order by time DESC LIMIT 25");
		return $query->result();
	}
}