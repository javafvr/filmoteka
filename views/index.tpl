<h1 class="title-1">Фильмотека</h1>

<?php 

	foreach ($films as $film => $value) {

?>

<div class="card mb-20">
	<div class="row">
		<div class="col-2">
			<img height="200" src="<?=HOST . 'data/films/thumbnails/' .$value['photo']?>" alt="<?=$film['title']?>">
		</div>
		<div class="col-10">
			<div class="card__header">
				<h4 class="title-4"><?=$value['title']?></h4>
				
				<?php 
					if (isset($_SESSION['role'])) {
						if ($_SESSION['role'] == 'admin') {
				?>

					<div class="buttons">
						<a href="edit.php?id=<?=$value['id']?>"class='button button--edit'>Редактировать</a>
						<a href="?action=delete&id=<?=$value['id']?>"class='button button--delete'>Удалить</a>
					</div>

				<?php 
						}
					}
				?>


				

			</div>
			<div class="badge"><?=$value['genre']?></div>
			<div class="badge"><?=$value['year']?></div>
			<div class="mt-20">
				<a href="single.php?id=<?=$value['id']?>" class="button">Подробнее</a>
			</div>
		</div>
	</div>
</div>

<?php } ?>