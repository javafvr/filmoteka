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
function film_new($link, $title, $genre, $year){
	
	$query = "INSERT INTO films (title, genre, year) VALUES (
	'". mysqli_real_escape_string($link, $title) . "',
	'". mysqli_real_escape_string($link, $genre) . "',
	'". mysqli_real_escape_string($link, $year) . "'
	)";

	if (mysqli_query($link, $query)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

// Update movie at db
function update_film($link, $title, $genre, $year, $id){
	$query = "UPDATE films
	        SET title = '". mysqli_real_escape_string($link, $title) . "',
	            genre = '". mysqli_real_escape_string($link, $genre) . "',
	            year = '". mysqli_real_escape_string($link, $year) . "'
	            WHERE id = '". mysqli_real_escape_string($link, $id) . "' LIMIT 1";
	$result = mysqli_query($link, $query);

	return $result;
}

// Delete movie from db
function delete_film ($link, $id){
	$query = "DELETE FROM films WHERE id = '" . mysqli_real_escape_string($link, $id)."' LIMIT 1";
	
	return mysqli_query($link, $query);
}

?>