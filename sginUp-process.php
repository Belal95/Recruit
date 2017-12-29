<?php
require '/helpers.php';
$rules[
	'firstName' => 'First name|required|string|min:2|max:20',
	'lastName' 	=> 'Last name|string|min:2|mac:20',
	'email' 	=> 'E-mail|required|email|unique|min:8|max:50',
	'password' 	=> 'Password|required|confirm|string|min:8|max:50',
	'gender' 	=> 'Gender|string|min:4|max:6',
	'location' 	=> 'Location|string|min:3|max:12'
];
$sql = "";
if(is_post()){
	$errors = validate($_POST,$rules);
	if (count($errors) = 0) {
		query($sql);

	}else{
		$_SESSION['errors'] = $errors;
		header('location:index.php')
	}
}
?>