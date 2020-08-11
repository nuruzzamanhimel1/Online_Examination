<?php 
    $filepath = realpath(dirname(__FILE__));
	
	include_once ($filepath.'/../classes/User.php');

	$usr = new User();

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$userId = $_POST['udtuserId'];
		$name = $_POST['udtname'];
		$username = $_POST['udtusername'];
		$email = $_POST['udtemail'];

		$login = $usr->userProfileUdtAJAX($userId,$name,$username,$email);
	}

?>
