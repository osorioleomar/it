<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("users");
	}

	function index(){
		$data = array(
			'users'=>$this->users->all(),
			);
		$this->load->view("ajax/settings",$data);
	}

}