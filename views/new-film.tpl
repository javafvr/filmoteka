<h1 class="title-1">Добавить новый фильм</h1>

      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        <form action="new.php" method="POST">
        	
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
          </div><input type="submit" class="button" value = "Добавить" name="add-film">
        </form>
      </div>