<?php 

function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

	if (mysqli_connect_error()) {
		die("Ошибка подключения к БД");
	}

	if(!mysqli_set_charset($link, 'utf8')){
		print_f("Error: " . mysqli_error($link));
	}

	return $link;
}


 ?>