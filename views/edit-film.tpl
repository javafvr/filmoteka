<h1 class="title-1">Фильм <?=$film['title']?></h1>

      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Редактировать фильм</div>
        <form action="edit.php?id=<?=$film['id']?>" method="POST">
        	
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
          <input class="input" type="text" placeholder="Введите название" name="title" value="<?=$film['title']?>"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="Введите жанр" name="genre" value="<?=$film['genre']?>"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="Введите год" name="year" value="<?=$film['year']?>"/>
            </div>
          </div><input type="submit" class="button" value = "Сохранить" name="update-film">
        </form>
      </div>