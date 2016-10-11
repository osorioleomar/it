<?php

class Downloads extends CI_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model("requests");
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
			"time"=>date("Y-m-d H:i:s")
			);
		$this->requests->addRequest($data);
		$this->emailIT($data);
	}

	function emailIT($data){

		/*
		* Setup email configuration
		* We will be using a gmail account
		*/
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'it.cimtechnologies.com@gmail.com',
			'smtp_pass' => 'lite-onitcorp.',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			 'wordwrap' => TRUE
		);

		/*
		* Get all the details from the submitted form with the $data array
		*	Consolidate those details and form an html email
		*/
		$message = "Here's a new download request from " . $data['requestor'] . "<br>URLs: " . $data['url'] . "<br>Reason: " . $data['reason'] . "<br>They need it " . $data['urgency'];

		$this->load->library("email",$config);
		$this->email->set_newline("\r\n");
	    $this->email->from('it@cimtechnologies.com');
	    $this->email->to('techservice@cimtechnologies.com');
	    $this->email->subject('New Download Request');
	    $this->email->message($message);
	    if($this->email->send()){
		    echo 'Email sent.';    
		}else{
		    show_error($this->email->print_debugger());  
		}
	}

	function all(){
		$data['requests'] = $this->requests->getRequests();
		$this->load->view("ajax/requests",$data);
	}

	function pending(){
		$data['requests'] = $this->requests->getPending()->result();
		$data['count'] = $this->requests->getPending()->num_rows();

		$this->load->view("ajax/requests",$data);
	}

	function mark($id){
		$this->requests->markDone($id);
	}
}