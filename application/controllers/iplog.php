<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iplog extends CI_Controller{

	function __construct(){
		parent::__construct();

		if(!isset($this->session->name)){
			redirect(base_url('index.php/user/login'));
		}
		
		$this->load->model("model_ip");
	}

	function index(){
		$data['details'] = $this->model_ip->get_active_ip();

		$this->load->view("active_ip",$data);
	}

	function load_new_form(){
		$data['available_ip'] = $this->model_ip->get_available_ip();

		$this->load->view("ajax/new_ip",$data);
	}

	function new_assignment(){
		$data = array(
			"ip"=>$this->input->post("ip"),
			"status"=>"active",
			"computername"=>$this->input->post("computername"),
			"username"=>$this->input->post("username"),
			"device"=>$this->input->post("device"),
			"macaddress"=>$this->input->post("macaddress"),
			"department"=>$this->input->post("department"),
			);
		$this->model_ip->new_ip($data);
	}

	function show_assignment_details(){
		$data['details'] = $this->model_ip->get_ip($this->input->post("ip"));

		$this->load->view("ajax/modify_ip",$data);
	}

	function set_inactive(){
		$this->model_ip->disable_ip($this->input->post("ip"));
	}

	function edit_assignment(){
		$data = array(
			"ip" => $this->input->post("ip"),
			"username" => $this->input->post("username"),
			"computername"=> $this->input->post("computername"),
			"macaddress" => $this->input->post("macaddress"),
			"device" => $this->input->post("device"),
			"department"=>$this->input->post("department"),
			);

		$this->model_ip->edit_assignment($data);
	}

	function loadLogs(){
		$data['logs'] = $this->model_ip->getLogs();

		$this->load->view("ajax/logs",$data);
	}
}