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

      <div class="col-md-10 mb-4">
        <h4 class="mb-4">Настройки</h4>
        <hr>

        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Изменить контактные данные
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">

                <form id="editContactsForm">
                  <div class="row">
                    <div class="col">
                      <label for="name">Имя</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="<?=$this->user['name']?>">
                    </div>
                    <div class="col mb-3">
                      <label for="surname">Фамилия</label>
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="<?=$this->user['surname']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="<?=$this->user['phone']?>">
                    <button type="button" class="btn btn-success mt-4">Сохранить изменения</button>
                  </div>
                </form>

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Изменить пароль
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">

                <form id="editPassword">
                  <div class="row">
                    <div class="col">
                      <label for="password">Новый пароль</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="">
                    </div>
                    <div class="col">
                      <label for="r_password">Повторите пароль</label>
                      <input type="text" class="form-control" id="r_password" name="r_password" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-success mt-4">Сохранить изменения</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Изменить E-Mail адрес
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <form id="editEmail">
                  <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?=$this->user['email']?>">
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-success mt-2">Сохранить изменения</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-2">
        <h4 class="mb-4">Навигация</h4>
        <ul class="nav flex-column nav-pills">
          <li class="nav-item">
            <a class="nav-link" href="/mylots">Мои объявления</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/favourites">Избранное</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/settings">Настройки</a>
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
