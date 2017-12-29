<?php
	
	session_start();
	// Check if the method is post
	function is_post(){
		if( strtolower($_SERVER['REQUEST_METHOD'] == 'post') ){
			return true;
		}
		else return false;
	}

	// Check if the method is get
	function is_get(){
		if( strtolower($_SERVER['REQUEST_METHOD'] == 'get') ){
			return true;
		}
		else return false;
	}
	// Redirect to a path then stop executing
	function redirect($path){
		header("location: {$path}");
		exit();
	}

	// Takes the data from the user and the rules from developer and validate
	function validate($data , $rules){
		$errors = []; // Will push errors here
		foreach ($rules as $key => $value) {
			$value = explode('|', $value);
			//ex: $key = firstName
			//ex: $value = ['First name','required','string','min:20']
			$field = $value[0];
			// $data[$key] => $data['firstName']
			
			//to check if the key is pressent
			if ( in_array('required', $value) && !isset($data[$key]) ) {
				$errors[] = $field.' field is required.';
			}
			//to check if the value is entered
			if ( in_array('required', $value) && empty($data[$key]) ) {
				$errors[] = $field.' field should be filled.';
			}
			//Will start here to check each rule
			if ( !empty($data[$key]) ) {
				//$k is the key
				//$v is the value
				foreach ($value as $k => $v) {
					
					if ( $v == 'string' && !is_string($data[$key]) ){
						$errors[] = $field.' must be a string.';
					}
					
					if ( $v == 'number' && !is_numeric($data[$key]) ){
						$errors[] = $field.' must be a number.';
					}
					
					if ( $v == 'array' && !is_array($data[$key]) ){
						$errors[] = $field.' must be an array.';
					}

					if ( $v == 'email' && !filter_var($data[$key] , FILTER_VALIDATE_EMAIL) ){
						$errors[] = $field.' must be an array.';
					}

					if ( $v == 'confirm' && !isset($data["{$k}_confirmation"]) ){
						$errors[] = $field.' must be an confirmed.';
					}
					// Ask Hesham why use not empty??
					if ( $v == 'confirm' && !empty($data["{$k}_confirmation"]) && $data[$key] != $data["{$k}_confirmation"] ){
						$errors[] = $field.' confirmation dosn\'t match';
					}

					if ( substr($v,0,3) == 'max'){
						$length = substr($v, 4);
						if ( strlen($data[$key]) > $length) {
							$errors[] = $field.' must be less than '.$length.' characters';
						}
					}

					if ( substr($v,0,3) == 'min'){
						$length = substr($v, 4);
						if ( strlen($data[$key]) < $length) {
							$errors[] = $field.' must be more than '.$length.' characters';
						}
					}

					if (substr($v,0,6) == 'unique') {
						$table = explode( ',', substr($v,7) );
						if (empty($table[0]) || empty($table[1]) ) {
							throw new Exception("Your uniqe parameters is not valid");	
						}
						$exist = fetch("SELECT * FROM {$table[0]} WHERE {$table[1]} = '{$data[$key]}' LIMIT 1 ");
						if ($exist) {
							$errors[] = $data[$key].' is already in use'
						}
					}

					if (substr($v,0,6) == 'exists') {
						$table = explode( ',', substr($v,7) );
						if (empty($table[0]) || empty($table[1]) ) {
							throw new Exception("Your uniqe parameters is not valid.");	
						}
						$exist = fetch("SELECT * FROM {$table[0]} WHERE {$table[1]} = '{$data[$key]}' LIMIT 1 ");
						if (!$exist) {
							$errors[] = $data[$key].' dosen\'t match our records.';
						}
					}
				}
			}
		}
		return $errors;
	}

$auth = null;

	//Selecting
	function query($sql){
		$con = mysqli_connect('localhost','root','','recruit');

		if (!$con) {
			echo mysqli_connect_error();
			die;
		}

		$result = mysqli_query($con,$sql);

		if (mysqli_error()) {
			echo mysqli_error();
			die();
		}
		return $result;
	}
	//Fetching
	function fetch($sql){
		$result = query($sql);
		$rows = mysqli_num_rows();
		$data = [];
		for ($i=0;$i < $rows;$i++) {
			$data[] = mysqli_fetch_assoc();
		}
		return $data;
	}
	//Search by id
	function find($table,$id) {
		$result = fetch("SELECT * FROM {$table} WHERE id={$id} LIMIT 1");
		if (!empty($res)) {
			return $res[0];
		}
		else return false;
	}
	//Fetch All
	function all($table) {
		return fetch("SELECT * FROM {$table}")
	}
?>