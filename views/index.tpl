<h1 class="title-1">Фильмотека</h1>

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