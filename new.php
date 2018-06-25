<?php 
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-functions.php');


$inputErrors = array();

if (array_key_exists('add-film', $_POST)) {
	
	// Errors check
	if ($_POST['title'] == '') {
		$inputErrors[] = '<div class="error">Необходимо ввести название фильма.</div>';
	}
	
	if ($_POST['genre'] == '') {
		$inputErrors[] = '<div class="error">Необходимо ввести жанр фильма.</div>';
	}
	
	if ($_POST['year'] == '') {
		$inputErrors[] = '<div class="error">Необходимо ввести год фильма.</div>';
	}

	// If no any errors
	if (empty($inputErrors)) {
		$result = film_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);

		if ($result) {
			$addSuccess = '<div class="success">Фильм успешно добавлен.</div>';
		} else {
			$addError = '<div class="error">Ошибка добавления фильма.</div>';
		}
	}
}

include('views/head.tpl');
include('views/notifications.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');

?>