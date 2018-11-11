<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$this->title?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
      <link rel="stylesheet" href="<?=$this->path?>/css/bootstrap.css">
      <link rel="stylesheet" href="<?=$this->path?>/css/style_index.css">
  </head>
  <body>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Редактирование аккаунта</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editForm" method="post" role="form">

              <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="<?=$this->user['name']?>" >
              </div>
              <div class="form-group">
                <label for="surname">Фамилия</label>
                <input type="text" name="surname" id="surname" class="form-control" placeholder="<?=$this->user['surname']?>">
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="<?=$this->user['email']?>" autocomplete="new-password">
              </div>
              <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="<?=$this->user['phone']?>">
              </div>
              <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Новый пароль" autocomplete="new-password">
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary">Сохранить изменения</button>
          </div>
        </div>
      </div>
    </div>

<header>
<div class="container">
  <div class="content">
    <div class="col-lg-12">
        <p id="logoprofile" ><a href="/">MBK<small class="text-muted">shop</small></a></p>
    </div>
    <div class="advert">
      <div class="headcaption">
        <p>Мои Объвления</p>

        <div id="username" class="ml-auto">
          <a id="edit" data-toggle="modal" data-target="#exampleModal" title = "Нажмите для редактирования профиля"><?=$this->user['name']?> <?=$this->user['surname']?></a><span><a href="/logout">(Выйти)</a></span>
        </div>
        <!-- Modal -->
      </div>

    <? if ($this->lots != null): ?>
      <? for($i = 0; $i < count($this->lots); $i++): ?>
        <div id="productr">
            <div class="row">
              <div class="leftinfo">
                <img src="/uploads/lots/<?=$this->lots[$i]['image']?>" alt="img" id="imgproduct">
                <div id="info2">
                    <span><?=$this->lots[$i]['title']?></span>
                </div>
              </div>
              <div class="rightinfo ml-auto">
                <span>Цена</span>
                <span><?=$this->lots[$i]['price']?> грн</span>
                <button class="btn" type="button" data-toggle="collapse" data-target="#multiCollapseExample_<?=$i?>" aria-expanded="false" aria-controls="collapseExample">
                    Подробное описание <i class="fas fa-arrow-down"></i>
                  </button><br>
                  <button type="button" class="btn" onclick="deleteLot(<?=$this->lots[$i]['lot_id']?>);">Удалить</button>
              </div>
            </div>
            <div class="collapse" id="multiCollapseExample_<?=$i?>">
                  <div class=" card-body">
  			  		<?=$this->lots[$i]['about']?>
                  </div>
              </div>
  		</div>
  		<? endfor; ?>
    <? else: ?>
      Нет объявлений.
    <? endif; ?>
    </div>

  </div>
</div>
</header>





    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?=$this->path?>/js/main.js" charset="utf-8"></script>
  </body>
</html>
