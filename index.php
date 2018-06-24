<?php 

require('config.php');
require('database.php');
$link = db_connect();


require('models/films.php');
$films = films_all($link);

if (@$_GET['action'] == 'delete') {
  // delete_film($link, $_GET['id']);

  if(delete_film($link, $_GET['id'])) {
    $addSuccess = '<div class="info">Фильм успешно удален.</div>';
  }
}

include('views/head.tpl');
include('views/index.tpl');
include('views/footer.tpl');


?>
