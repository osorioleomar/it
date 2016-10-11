<?php

class Downloads extends CI_Controller{

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

		$this->load->model('model_requests');
		$this->model_request->addRequest($data);	
	}
}