<?php 

	// CONNECT TO MYSQL DB
	$link = mysqli_connect('localhost', 'root', '', 'filmoteka');
  

	if (mysqli_connect_error()) {
		die("Ошибка подключения к БД");
	}

	$inputErrors = array();
	
	// Delete movie
		if (@$_GET['action'] == 'delete') {
			$query = "DELETE FROM films WHERE id = '" . mysqli_real_escape_string($link, $_GET['id'])."' LIMIT 1";

			mysqli_query($link, $query);

			if(mysqli_affected_rows($link)>0) {
				$addSuccess = '<div class="info">Фильм успешно удален.</div>';
			}

		}

	// SAVE FORM TO DB
	

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
			$query = "INSERT INTO films (title, genre, year) VALUES (
			'". mysqli_real_escape_string($link, $_POST['title']) . "',
			'". mysqli_real_escape_string($link, $_POST['genre']) . "',
			'". mysqli_real_escape_string($link, $_POST['year']) . "'
			)";
			if (mysqli_query($link, $query)) {
				$addSuccess = '<div class="success">Фильм успешно добавлен.</div>';
			} else {
				$addError = '<div class="error">Ошибка добавления фильма.</div>';
			}
			
		}
	}

	// GET FILMS FROM DB
	$query = "SELECT * FROM films";
	$films = array();

	if ($result = mysqli_query($link, $query)) {

		while ($row = mysqli_fetch_array($result)) {
			$films[] = $row;
		}

	}

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <title>UI-kit и HTML фреймворк - Документация</title>
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/><!-- build:cssVendor css/vendor.css -->
    <link rel="stylesheet" href="libs/normalize-css/normalize.css"/>
    <link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css"/>
    <link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css"/><!-- endbuild -->
<!-- build:cssCustom css/main.css -->
    <link rel="stylesheet" href="./css/main.css"/><!-- endbuild -->
    <link rel="stylesheet" href="./css/custom.css"/><!-- endbuild -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="container user-content pt-35">
      <h1 class="title-1"> Фильмотека</h1>
      
      <?php 

      	foreach ($films as $film => $value) {

      ?>
      
      <div class="card mb-20">
        <div class="card__header">
        	<h4 class="title-4"><?=$value['title']?></h4>
        	<div class="buttons">
        		<a href="edit.php?id=<?=$value['id']?>"class='button button--edit'>Редактировать</a>
        		<a href="?action=delete&id=<?=$value['id']?>"class='button button--delete'>Удалить</a>
        	</div>
        </div>
        <div class="badge"><?=$value['genre']?></div>
        <div class="badge"><?=$value['year']?></div>
      </div>
      
      <?php } ?>
      
      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        <form action="index.php" method="POST">
        	
        	<?php if (@$addError != '') { echo @$addError; } ?>
        	
        	<?php if (@$addSuccess != '') { echo @$addSuccess; } ?>

        	<?php 

        		if (!empty($inputErrors)) {
        			foreach ($inputErrors as $error => $value) {
        				echo "$value";
        			}
        		}

        	 ?>
          
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" placeholder="Такси 2" name="title"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="комедия" name="genre"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="2000" name="year"/>
            </div>
          </div><input type="submit" class="button" value = "Добавить" name="add-film"><!-- <a class="button" href="regular">Добавить	</a> -->
        </form>
      </div>
    </div><!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>