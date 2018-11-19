<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$this->title?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=$this->path?>/css/style.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="/"><i class="fas fa-shopping-basket"></i> MBKShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/add">Подать объявление</a>
          </li>
          <? if (User::isAdmin()): ?>
          <li class="nav-item">
            <a class="nav-link" href="/admin">Админ-панель</a>
          </li>
          <? endif; ?>
        </ul>
        <? if (User::isLogged() == true): ?>
        <div class="dropdown" style="cursor: pointer;">
          <a class="dropdown-toggle text-white" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i> <?=$this->user['name'].' '.$this->user['surname']?>
          </a>
          <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenu2">

            <a class="dropdown-item" href="/mylots"><i class="fas fa-bars"></i> Мои объявления</a>
            <a class="dropdown-item" href="/favorites"><i class="far fa-star"></i> Избранное</a>
            <a class="dropdown-item" href="/settings"><i class="fas fa-cog"></i> Настройки</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Выйти</a>
          </div>
        </div>
        <? else:?>
        <a href="/register" class="btn btn-outline-light btn-sm">Создать аккаунт</a>
        <? endif; ?>
      </div>

  </nav>

  <div class="container">
    <div class="row mt-5">

      <div class="col-md-10">
        <h4 class="mb-4">Избранное</h4>
        <? if ($this->fav_lots != null): ?>
        <div class="table-responsive">
          <table class="table table-bordered">

            <caption>Всего объявлений: <?=count($this->fav_lots)?></caption>
            <thead>
              <tr>
                <th scope="col">Изображение</th>
                <th scope="col">Описание</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              <? for ($i = 0; $i < count($this->fav_lots); $i++): ?>
              <tr>
                <th scope="row" class="text-center"><img  style="height: 50px;" class="img mh-100" src="/uploads/lots/<?=$this->fav_lots[$i]['image']?>" alt=""></th>
                <td>
                  <div class="d-flex w-100 justify-content-between">
                    <a href="/lot/<?=$this->fav_lots[$i]['lot_id']?>.html" target="_blank"><?=$this->fav_lots[$i]['title']?></a>
                    <small class="text-muted"><?=$this->fav_lots[$i]['price']?> <?=$this->fav_lots[$i]['currency_detail']['symbol']?></small>
                  </div>
                </td>
                <td>
                  <div class="btn-group btn-group-sm" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Выберите
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="/lot/<?=$this->fav_lots[$i]['lot_id']?>.html">Просмотреть</a>
                        <a class="dropdown-item" onclick="deleteLotFromFavourite(<?=$this->fav_lots[$i]['lot_id']?>);">Удалить из избранных</a>
                      </div>
                    </div>
                </td>
              </tr>
              <? endfor; ?>
            </tbody>
          </table>
        </div>
        <? else: ?>
        <hr>
        <p class="text-center">Объявлений нет.</p>
        <? endif; ?>
      </div>

      <div class="col-md-2">
        <h4 class="mb-4">Навигация</h4>
        <ul class="nav flex-column nav-pills">
          <li class="nav-item">
            <a class="nav-link" href="/mylots">Мои объявления</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/favourites">Избранное</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/settings">Настройки</a>
          </li>

        </ul>

      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="<?=$this->path?>/js/main.js" charset="utf-8"></script>

</body>
</html>
