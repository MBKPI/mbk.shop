<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=$this->path?>/css/style.css">
  <title><?=$this->title?></title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="/"><i class="fas fa-shopping-basket"></i> MBKShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Главная <span class="sr-only">(текущая)</span></a>
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

    <div class="row justify-content-center">
      <div class="col-md-6 mt-5 text-center">
        <div class="input-group input-group-lg">
          <input type="search" class="form-control" placeholder="Что требуется найти?" aria-label="Что требуется найти?" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i> Поиск</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <? if ($this->lots != null): ?>
        <? for($i = 0; $i < count($this->lots); $i++): ?>
      <div class="col-md-6 mt-5">
        <div class="card mb-2">
          <img class="card-img-top" src="/uploads/lots/<?=$this->lots[$i]['image']?>" height="240px" alt="Card image cap">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title"><a class="text-dark" href="/lot/<?=$this->lots[$i]['lot_id']?>.html"><?=$this->lots[$i]['title']?></a></h5>
              <p class="text-muted"><?=$this->lots[$i]['price']?> <?=$this->lots[$i]['currency_detail']['symbol']?></p>
            </div>
          </div>
        </div>
      </div>
      </div>
        <? endfor; ?>
      <? else: ?>
      <div class="col">
        <div class="alert alert-dark mt-5 text-center" role="alert">
          <h4 class="alert-heading">Ошибка!</h4>
          На данной странице нет объявлений, попробуйте воспользоваться поиском
        </div>
      </div>
      <? endif; ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
