<?php

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');

// Update movie at db
if (array_key_exists('update-film', $_POST)) {
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
    if (update_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_GET['id'])) {
      $addSuccess = '<div class="info">Фильм успешно обновлен.</div>';
    } else {
      $addError = '<div class="error">Ошибка добавления фильма.</div>';
    }
  }
}

$film =get_film($link, $_GET['id']);

$inputErrors = array();

include('views/head.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>