<?php 
require('config.php');
require('database.php');
$link = db_connect();

require('functions/login-functions.php');


if (isset($_POST['enter'])) {
	$userData = getAuthInfo($link, $_POST['login']);

	if ($_POST['login'] == $userData['name']) {
		if ($_POST['password'] == $userData['password']) {
			$_SESSION['user'] = $userData['name'];
			$_SESSION['role'] = $userData['role'];
			
			header('Location: ' . HOST . 'index.php');
		}
	}
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');
?>