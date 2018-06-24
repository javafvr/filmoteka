<?php 

require('config.php');
require('database.php');
$link = db_connect();


require('models/films.php');

if (@$_GET['action'] == 'delete') {
  if(delete_film($link, $_GET['id'])) {
    $addSuccess = '<div class="info">Фильм успешно удален.</div>';
  }
}

$films = films_all($link);

include('views/head.tpl');
include('views/index.tpl');
include('views/footer.tpl');


?>
