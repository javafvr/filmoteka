<?php 

// Getting all films from db
function films_all($link){
	
	$query = "SELECT * FROM films";
	$films = array();
	
	if ($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_array($result)) {
			$films[] = $row;
		}
	}

	return $films;
}

// Getting movie from db
function get_film($link, $id){
	$movie = array();
	$query = "SELECT * FROM films WHERE id='" . mysqli_real_escape_string($link, $id)."' LIMIT 1";
	if ($result = mysqli_query($link, $query)) {
		$movie = mysqli_fetch_array($result);
	}

	return $movie;
}

// Adding movie to db
function film_new($link, $title, $genre, $year, $description){
	// print_r($_FILES);
	if (isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "") {
		$photo = addPhoto();
	}
	$query = "INSERT INTO films (title, genre, year, description, photo) VALUES (
	'". mysqli_real_escape_string($link, $title) . "',
	'". mysqli_real_escape_string($link, $genre) . "',
	'". mysqli_real_escape_string($link, $year) . "',
	'". mysqli_real_escape_string($link, $description) . "',
	'". mysqli_real_escape_string($link, $photo) . "'
	)";

	if (mysqli_query($link, $query)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

// Update movie at db
function update_film($link, $title, $genre, $year, $description, $id){
	
	$db_file_name = '';
	if (isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "") {
		$fileName = $_FILES["photo"]["name"];
		$fileTempLoc = $_FILES["photo"]["tmp_name"];
		$fileType = $_FILES["photo"]["type"];
		$fileSize = $_FILES["photo"]["size"];
		$fileErrorMsg = $_FILES["photo"]["error"];

		$kaboom = explode(".", $fileName);
		$fileExt = end($kaboom);

		list($width, $height) = getimagesize($fileTempLoc);

		if ($width<10 || $height < 10) {
			$errors[] = 'That image has no dimensions';
		}

		$db_file_name = rand(100000000000,  999999999999) . "." . $fileExt;

		if ($fileSize > 1048576) {
			$errors[] = 'Your image file was larger than 10mb';
		} elseif (!preg_match("/\.(gif|jpg|jpeg|png|)$/i", $fileName)) {
			$errors[] = 'Your image file was not jpg, jpeg, gif or png type';
		} elseif ($fileErrorMsg == 1) {
			$errors[] = 'An unknown error occurred';
		}

		$photoFolderLocation = ROOT . 'data/films/full/';
		$photoFolderLocationMin = ROOT . 'data/films/thumbnails/';
		// $photoFolderLocationFull = ROOT . 'data/films/';
		$uploadfile = $photoFolderLocation . $db_file_name;
		$moveResult = move_uploaded_file($fileTempLoc, $uploadfile);

		if ($moveResult != true) {
			$errors[] = 'File upload failed';
		}

		require_once(ROOT . "/functions/image_resize_imagick.php");
		$target_file = $photoFolderLocation . $db_file_name;
		$resized_file = $photoFolderLocationMin . $db_file_name;
		$wmax = 137;
		$hmax = 200;
		$img = createThumbnail($target_file, $wmax, $hmax);
		$img->writeImage($resized_file);
	}

	$query = "UPDATE films
	        SET title = '". mysqli_real_escape_string($link, $title) . "',
	            genre = '". mysqli_real_escape_string($link, $genre) . "',
	            year = '". mysqli_real_escape_string($link, $year) . "',
	            description = '". mysqli_real_escape_string($link, $description) . "',
	            photo = '". mysqli_real_escape_string($link, $db_file_name) . "'
	            WHERE id = '". mysqli_real_escape_string($link, $id) . "' LIMIT 1";
	$result = mysqli_query($link, $query);

	return $result;
}

// Delete movie from db
function delete_film ($link, $id){
	$query = "DELETE FROM films WHERE id = '" . mysqli_real_escape_string($link, $id)."' LIMIT 1";
	
	mysqli_query($link, $query);

	if(mysqli_affected_rows($link) >0){
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function addPhoto()
{
		
		$fileName = $_FILES["photo"]["name"];
		$fileTempLoc = $_FILES["photo"]["tmp_name"];
		$fileType = $_FILES["photo"]["type"];
		$fileSize = $_FILES["photo"]["size"];
		$fileErrorMsg = $_FILES["photo"]["error"];

		$kaboom = explode(".", $fileName);
		$fileExt = end($kaboom);

		list($width, $height) = getimagesize($fileTempLoc);

		if ($width<10 || $height < 10) {
			$errors[] = 'That image has no dimensions';
		}

		$db_file_name = rand(100000000000,  999999999999) . "." . $fileExt;

		if ($fileSize > 1048576) {
			$errors[] = 'Your image file was larger than 10mb';
		} elseif (!preg_match("/\.(gif|jpg|jpeg|png|)$/i", $fileName)) {
			$errors[] = 'Your image file was not jpg, jpeg, gif or png type';
		} elseif ($fileErrorMsg == 1) {
			$errors[] = 'An unknown error occurred';
		}

		$photoFolderLocation = ROOT . 'data/films/full/';
		$photoFolderLocationMin = ROOT . 'data/films/thumbnails/';
		$uploadfile = $photoFolderLocation . $db_file_name;
		$moveResult = move_uploaded_file($fileTempLoc, $uploadfile);

		if ($moveResult != true) {
			$errors[] = 'File upload failed';
		}

		require_once(ROOT . "/functions/image_resize_imagick.php");
		$target_file = $photoFolderLocation . $db_file_name;
		$resized_file = $photoFolderLocationMin . $db_file_name;
		$wmax = 137;
		$hmax = 200;
		$img = createThumbnail($target_file, $wmax, $hmax);
		$img->writeImage($resized_file);

		return $db_file_name;
}




?>