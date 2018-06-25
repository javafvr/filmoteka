<?php

function isAdmin(){
	$result = false;
	if (isset($_SESSION['role'])) {
		if ($_SESSION['role'] == 'admin') {
			$result = true;
		}
	}
	return $result;
}

function getAuthInfo($link, $name){
	$userAuth = array();
	$query = "SELECT * FROM users WHERE name='" . mysqli_real_escape_string($link, $name)."' LIMIT 1";
	if ($result = mysqli_query($link, $query)) {
		$loginInfo = mysqli_fetch_array($result);
	}

	return $loginInfo;

}

?>