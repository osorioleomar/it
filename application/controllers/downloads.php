<?php

class Downloads extends CI_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model("Model_Request");
	}

	function index(){
		$this->load->view("request");
	}

	function submit(){
		$data = array(
			"url"=>$this->input->post("url"),
			"reason"=>$this->input->post("reason"),
			"urgency"=>$this->input->post("urgency"),
			"requestor"=>$this->input->post("requestor"),
			);
		$this->model_request->addRequest($data);	
	}
}