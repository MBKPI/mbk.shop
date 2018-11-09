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

  <div class="container">

    <div class="row justify-content-between">
      <div class="col-md-5 mt-5">
        <div class="logotype"><a href="/">MBKshop</a></div>
      </div>
      <div class="col-md-5 mt-5">
        <div class="profile text-right"><a href="/profile"><i class="far fa-user-circle "></i> Мой профиль</a></div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6 mt-5 text-center add-button">
        <a href="/add" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus"></i> Добавить объявление</a>
      </div>
    </div>

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

    <div class="row justify-content-center">
      <div class="col mt-5">
        <? for($i = 0; $i < count($this->lots); $i++): ?>
        <div class="card mb-3">
          <img class="card-img-top" src="/uploads/lots/<?=$this->lots[$i]['image']?>" width="1149px" height="180px" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?=$this->lots[$i]['title']?> <p class="float-right text-muted">Цена: <b><?=$this->lots[$i]['price']?> грн.</b></p></h5>
            <p class="card-text"><?=$this->lots[$i]['about']?><br>Номер телефона: <?=$this->lots[$i]['phone']?></p>
            <p class="card-text"><small class="text-muted">Опубликовано 3 минуты назад</small></p>
          </div>
        </div>
        <? endfor; ?>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
