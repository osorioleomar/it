<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	function __construct(){
		parent::__construct();

		if(!isset($this->session->name)){
			redirect(base_url('index.php/user/login'));
		}

		$this->load->model('model_faq');
	}

	function index(){
		$this->load->model('requests');
		$data = array(
			'faq' => $this->model_faq->search($this->input->post('keyword')),
			'pendingCount'=> $this->requests->getPending()->num_rows(),
			);

		$this->load->view('template/header');
		$this->load->view('home',$data);
		$this->load->view('template/footer');
	}

	function view_faq(){
		
	}

}