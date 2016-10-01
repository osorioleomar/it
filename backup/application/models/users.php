<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model{

	/*
	* Remove a user from table permanently
	*/
	function delete(){

	}

	/*
	* Modify an existing user record
	*/
	function modify($id,$data){
		$this->db->where("userid",$id);
		$this->db->update("login",$data);

		echo "Success!";
	}

	/*
	* Searches the database if the login account exists
	* returns the username and usertype as session if TRUE
	*/
	function login($username,$password){
		$data = array(
			'username' => $username,
			'password' => sha1($password)
			);
		$query = $this->db->get_where('login',$data);
		
		$return = $query->num_rows();

		if($return == 0){
			return 0;
		}else{
			return $query->result();
		}
	}

}

?>