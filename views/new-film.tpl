<h1 class="title-1">Добавить новый фильм</h1>

      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        <form enctype="multipart/form-data" action="new.php" method="POST">
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
          </div>
          <label class="label-title">Описание фильма</label>
          <textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма" id="" cols="30" rows="10"></textarea>
          <div class="file-upload mb-20">
            <legend>
              <div class="title-6 mb-2">Изображение</div>
                <div class="legend__descr"> 
                  <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более, вес до 2Мб.</p>
                </div>
            </legend>
            <input class="inputfile" id="#file-3" type="file" name="photo" data-multiple-caption="{count} файлов выбрано" multiple="multiple">
            <label for="#file-3">Выбрать файл</label><span>Файл не выбран</span>
            <!-- <div class="file-upload__thumb"><img src="../img/blog/img-post-uploaded.jpg"><a class="button button--delete" href="#">Удалить</a></div> -->
          </div>
          <input type="submit" class="button" value = "Добавить" name="add-film">
        </form>
      </div>