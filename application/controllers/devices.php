<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("model_devices");
	}

	function index(){
		$data['devices'] = $this->model_devices->get_devices();

		$this->load->view("devices",$data);
	}

	function add_device(){
		$data = array(
			"devicename"=>$this->input->post("devicename"),
			"processor"=>$this->input->post("processor"),
			"memory"=>$this->input->post("memory"),
			"harddrive"=>$this->input->post("harddrive"),
			"nic"=>$this->input->post("nic"),
			"vga"=>$this->input->post("vga"),
			"serial"=>$this->input->post("serial"),
			);

		$this->model_devices->new_device($data);

		echo "Success!";
	}

	function delete(){
		$this->model_devices->obsolete($this->input->post("id"));
	}
}