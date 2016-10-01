<?php

class Input extends CI_Controller{

	function index(){
		$data = array();
		$i = 1;

		while ( $i <= 255) {
			$data = array(
				"ip"=>"192.168.8.".$i,
				"status"=>"inactive",
				);

		$this->db->insert("ip_status",$data);
		$data = array();
		$i++;
		}
		echo "done!";
	}
}

?>