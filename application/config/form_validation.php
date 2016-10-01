<?php

$config = array(
	'register' => array(
		array(
			'field'=>'username',
			'label'=>'Username',
			'rules'=>'required|valid_email|is_unique[login.username]'
			),
		array(
			'field'=>'password',
			'label'=>'Password',
			'rules'=>'required|min_length[6]'
			),
		array(
			'field'=>'passwordconf',
			'label'=>'Password Confirmation',
			'rules'=>'required|matches[password]'
			)
		),
	'login' => array(
		array(
			'field'=>'email',
			'label'=>'email',
			'rules'=>'required|valid_email'
			),
		array(
			'field'=>'password',
			'label'=>'password',
			'rules'=>'required'
			),
		),
	'edit' => array(
		array(
			'field'=>'username',
			'label'=>'Username',
			'rules'=>'required'
			),
		array(
			'field'=>'password',
			'label'=>'Password',
			'rules'=>'required|min_length[6]'
			),
		array(
			'field'=>'passwordconf',
			'label'=>'Password Confirmation',
			'rules'=>'required|matches[password]'
			)
		)
	);

?>