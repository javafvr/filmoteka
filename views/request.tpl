<h1 class="title-1">Укажите ваше имя и город</h1>
<div class="panel-holder mt-80 mb-40">
	<div class="title-4 mt-0">Добавить информацию</div>
	<form class="mb-50" enctype="multipart/form-data" action="set-cookie.php" method="POST">
		<label class="label-title">Ваше имя</label>
		<input class="input" type="text" placeholder="Введите ваше имя" name="user-name"/>
		<label class="label-title">Ваш город</label>
		<input class="input" type="text" placeholder="Введите ваш город" name="user-city"/>
		<input type="submit" class="button" value = "Сохранить" name="user-submit">
	</form>
	<form enctype="multipart/form-data" action="unset-cookie.php" method="POST">
		<input type="submit" class="button" value = "Удалить" name="user-unset">
	</form>
</div>