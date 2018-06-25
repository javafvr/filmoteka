<?php 
require('functions/login-functions.php');

require('config.php');
require('database.php');
$link = db_connect();


require('models/films.php');

if (@$_GET['action'] == 'delete') {
  if(delete_film($link, $_GET['id'])) {
    $addSuccess = '<div class="info">Фильм успешно удален.</div>';
  }
}

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/film-single.tpl');
include('views/footer.tpl');


?>