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

    <a class="navbar-brand" href="#"><i class="fas fa-shopping-basket"></i> MBKShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Главная <span class="sr-only">(текущая)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
        <? if (User::isLogged() == true): ?>
        <a href="/profile" class="btn btn-outline-light btn-sm">Профиль</a>
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
                <th scope="col">Заголовок</th>
                <th scope="col">Описание</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              <? for ($i = 0; $i < count($this->fav_lots); $i++): ?>
              <tr>
                <th scope="row" style="height: 100px;"><img class="img mh-100" src="/uploads/lots/<?=$this->fav_lots[$i]['image']?>" alt=""></th>
                <td><?=$this->fav_lots[$i]['title']?></td>
                <td><?=$this->fav_lots[$i]['about']?></td>
                <td>
                  <div class="btn-group btn-group-sm" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Выберите
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="/lot/<?=$this->fav_lots[$i]['lot_id']?>.html">Просмотреть</a>
                        <a class="dropdown-item" href="#">Удалить из избранных</a>
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
