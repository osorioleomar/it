<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FAQ extends CI_Controller{

	function __construct(){
		parent::__construct();

		if(!isset($this->session->name)){
			redirect(base_url());
		}

		$this->load->model('model_faq');
	}

	function load_faq(){
		$data = array(
			'faq' => $this->model_faq->get_FAQ(),
			);
		$this->load->view('ajax/title',$data);
	}

	function search(){
		$data = array(
			'faq'=>$this->model_faq->search($this->input->post("keyword")),
			);
		$this->load->view("ajax/title",$data);
	}

	function fetch_faq_content(){
		$data = array(
			'content' => $this->model_faq->get_FAQ_by_id($this->input->post("id")),
			);
		$this->load->view('ajax/content',$data);
	}

	function add(){
		$data = array(
			"subject"=>$this->input->post("subject"),
			"body"=>$this->input->post("body"),
			"tags"=>$this->input->post("tags")
			);

		$this->model_faq->add($data);
	}

	
}