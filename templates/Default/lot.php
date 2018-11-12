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
            <a class="nav-link" href="/add">Подать объявление</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
        <? if (User::isLogged() == true): ?>
        <div class="dropdown" style="cursor: pointer;">
          <a class="dropdown-toggle text-white" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i> <?=$this->user['name'].' '.$this->user['surname']?>
          </a>
          <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenu2">

            <a class="dropdown-item" href="/mylots"><i class="fas fa-bars"></i> Мои объявления</a>
            <a class="dropdown-item" href="/favourites"><i class="far fa-star"></i> Избранное</a>
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
    <? if ($this->lot['title'] != null): ?>
    <div class="row">
      <div class="col mt-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/category/<?=$this->lot['category_detail']['name_eng']?>"><?=$this->lot['category_detail']['name']?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$this->lot['title']?></li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">

      <div class="col-md-8 mt-2">
        <img src="/uploads/lots/<?=$this->lot['image']?>" class="img-thumbnail mx-auto d-block mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h4><?=$this->lot['title']?></h4>
          <small class="text-muted">Добавлен: <?=$this->lot['date']?></small>
        </div>
        <small class="text-muted">Номер объявления: <?=$this->lot['lot_id']?></small>
        <hr>
        <p><?=$this->lot['about']?></p>
        <hr>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <small class="text-muted"><i class="fas fa-eye"></i> Просмотры: 200</small>
          <ul>
            <a href="/share" class="mr-2"><i class="fas fa-share"></i> Поделится</a>
            <a href="/share"><i class="far fa-star"></i> В избранное</a>
          </ul>
        </div>
      </div>

      <div class="col-md-4 sticky-top h-100">
        <ul class="list-group mb-4">
          <li class="list-group-item flex-column align-items-center">
            <h5 class="text-center font-weight-bold"><?=$this->lot['price']?> <?=$this->lot['currency_detail']['symbol']?></h5>
          </li>
        </ul>

        <ul class="list-group">
          <li class="list-group-item flex-column align-items-center">
            <div class="d-flex w-100 justify-content-between">
              <span class="mb-1 font-weight-bold">Состояние</span>
              <span><?=$this->lot['state']?></span>
            </div>
          </li>
          <li class="list-group-item flex-column align-items-center">
            <div class="d-flex w-100 justify-content-between">
              <span class="mb-1 font-weight-bold">Категория</span>
              <span><a href="/category/<?=$this->lot['category_detail']['name_eng']?>"><?=$this->lot['category_detail']['name']?></a></span>
            </div>
          </li>
          <li class="list-group-item flex-column align-items-center">
            <div class="d-flex w-100 justify-content-between">
              <span class="mb-1 font-weight-bold">Автор</span>
              <span><a href="/user/<?=$this->lot['user_detail']['user_id']?>"><?=$this->lot['user_detail']['name']?> <?=$this->lot['user_detail']['surname']?></a></span>
            </div>
          </li>
        </ul>

        <a class="btn btn-primary btn-block mt-4" href="tel:<?=$this->lot['user_detail']['phone']?>"><i class="fas fa-phone"></i> Позвонить</a>
      </div>

      <div class="col-md-8 mt-4">
        <h5>Другие объявления пользователя</h5>
        <ul class="list-group mt-3">
          <li class="list-group-item flex-column align-items-center">
            <div class="d-flex w-100 justify-content-between">
              <div class="d-flex justify-content-start">
                <img src="/uploads/lots/<?=$this->lot['image']?>" width="85px" class="rounded w-10 h-75">
                <a href="" class="ml-4"><?=$this->lot['title']?></a>
              </div>
              <h5 class="text-muted"><?=$this->lot['price']?> <?=$this->lot['currency_detail']['symbol']?></h5>
            </div>
          </li>

        </ul>
      </div>

    </div>
    <? else: ?>
      <div class="row">
        <div class="col">
          <div class="alert alert-dark mt-5 text-center" role="alert">
            <h4 class="alert-heading">Ошибка</h4>
            Объявление удалено либо ещё не создано.
          </div>
        </div>
      </div>
    <? endif; ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
