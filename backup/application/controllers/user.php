<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model('users');
	}

	function index(){
		redirect(base_url());
	}

	/*
	* Registers a new user
	* Validates form entries, returns to form if 
	*  rules are missed
	*/
	function add_user(){

		$this->load->library('form_validation');

		if ($this->form_validation->run('register') == FALSE){
			$this->register();
		}else{

			$this->users->insert();
			$this->load->view('register_success');
		}
	}

	function login($error = 0){

		if(isset($this->session->name)){
			redirect(base_url());
		}
		
		$data['login_error'] = $error;
		$this->load->helper('form');
		$this->load->view("template/header");
		$this->load->view('login',$data);
		$this->load->view('template/footer');
	}

	function edit_user(){

			$id = $this->session->id;
			$data = array(
				"username"=>$this->input->post("username"),
				"password"=>sha1($this->input->post("password")),
				);
			$this->users->modify($id,$data);

	}

	/*
	* Gets post inputs from login page
	* and authenticates theme using $users->login()
	*/
	function authenticate(){

			$verify = $this->users->login($this->input->post('username'),$this->input->post('password'));

			if($verify == 0){
				$error = "Invalid username or password";
				$this->login($error);
			}else{
				$this->session->id = $verify[0]->userid;
				$this->session->username = $verify[0]->username;
				$this->session->name = $verify[0]->name;
				$this->session->user_type = $verify[0]->user_type;
				redirect(base_url());
			}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}