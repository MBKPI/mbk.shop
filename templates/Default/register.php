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
      <div class="col-md-4 order-md-1">

        <ul class="nav flex-column nav-pills nav-fill">
          <li class="nav-item">
            <a class="nav-link active" href="/register">Создать аккаунт</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Авторизация</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/lostpassword">Забыли пароль?</a>
          </li>
        </ul>

      </div>

      <div class="col-md-8 order-md-2">
        <h4 class="mb-3"><i class="fas fa-user-plus"></i> Регистрация</h4>
        <hr class="mb-4">
        <form id="form_reg">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name">Имя</label>
              <input type="text" class="form-control" id="name" name="name" required="">
            </div>
            <div class="col-md-6 mb-3">
              <label for="surname">Фамилия</label>
              <input type="text" class="form-control" id="surname" name="surname" required="">
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Адрес электронной почты</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="you@example.com" equired="">
            <small class="text-muted">На него будет отправлено письмо с подтверждением регистрации.</small>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="password">Пароль</label>
              <input type="password" class="form-control" id="password" name="password" required="">
            </div>
            <div class="col-md-6 mb-3">
              <label for="r_password">Повторите пароль</label>
              <input type="password" class="form-control" id="r_password" name="r_password" required="">
            </div>
          </div>

          <div class="mb-5">
            <label for="phone">Номер телефона</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="" equired="">
          </div>
          <button id="regbtn" class="btn btn-success btn-lg btn-block" type="submit">Создать аккаунт</button>
        </form>

      </div>

    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="<?=$this->path?>/js/main.js" charset="utf-8"></script>

</body>
</html>
