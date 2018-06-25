<h1 class="title-1">Фильм <?=$film['title']?></h1>
<div class="panel-holder mt-80 mb-40">
  <div class="title-4 mt-0">Редактировать фильм</div>
  <form enctype="multipart/form-data" action="edit.php?id=<?=$film['id']?>" method="POST">
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
    </div>
    <label class="label-title">Описание фильма</label>
    <textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма" id="" cols="30" rows="10"><?=$film['description']?></textarea>
    <div class="file-upload mb-20">
        <legend>
          <div class="title-6 mb-2">Изображение</div>
            <div class="legend__descr"> 
              <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более, вес до 2Мб.</p>
            </div>
        </legend>
        <input class="inputfile" id="#file-3" type="file" name="photo" data-multiple-caption="{count} файлов выбрано" multiple="multiple">
        <label for="#file-3">Выбрать файл</label><span>Файл не выбран</span>
        
        <? if ($film['photo']!=='') { ?>
          <div class="file-upload__thumb mt-20"><img src="<?=HOST . 'data/films/thumbnails/' .$film['photo']?>"><a class="button button--delete" href="#">Удалить</a></div>
        <?}?>
    
    </div>
    <input type="submit" class="button" value = "Сохранить" name="update-film">
  </form>
</div>