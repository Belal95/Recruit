<?php
require '/helpers.php';
$rules[
	'email'    => 'E-mail|required|email|exists:users,email',
	'password' => 'Password|required'
];
if(is_post()){

}
?>