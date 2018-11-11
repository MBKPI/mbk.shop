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
          <li class="nav-item">
            <a class="nav-link" href="/">Главная </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/add">Подать объявление <span class="sr-only">(текущая)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
        <a href="/profile" class="btn btn-outline-light btn-sm">Профиль</a>
      </div>

  </nav>

  <div class="container">
    <div class="row mt-5">

      <div class="col">
        <h4 class="mb-3"><i class="fas fa-plus"></i> Добавить объявление</h4>
        <hr>
          <form method="post" name="addLot" enctype="multipart/form-data" class="mt-4" id="addLotForm">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="title">Заголовок *</label>
                <input type="text" class="form-control" id="title" name="title" required="">
                <small class="text-muted">5-20 символов</small>
              </div>
              <div class="col-md-6 mb-3">
                <label for="category">Категория *</label>
                <select id="category" name="category" class="form-control">
                  <option selected disabled>Выберите категорию</option>
                  <? for ($i = 0; $i < count($this->categories); $i++): ?>
                  <option value="<?=$this->categories[$i]['category_id']?>"><?=$this->categories[$i]['name']?></option>
                  <? endfor; ?>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label for="about">Описание *</label>
              <textarea class="form-control" id="about" name="about" rows="7"></textarea>
              <small class="text-muted">Осталось 200 символов.</small>
            </div>
            <hr class="mt-3">

            <div class="row">
              <div class="col-md-6 mt-3">
                <p>Фотографии *</p>
                <img src="<?=$this->path?>/images/no_image.svg" alt="..." class="img-thumbnail" width="24%">
                <img src="<?=$this->path?>/images/no_image.svg" alt="..." class="img-thumbnail" width="24%">
                <img src="<?=$this->path?>/images/no_image.svg" alt="..." class="img-thumbnail" width="24%">
                <img src="<?=$this->path?>/images/no_image.svg" alt="..." class="img-thumbnail" width="24%">

                <div class="input-group mt-3 text-left">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo" id="images" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="images">Выбрать</label>
                  </div>
                </div>

              </div>

              <div class="col-md-6 mt-3">

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="price">Цена *</label>
                    <input type="text" class="form-control" id="price" name="price" required="" placeholder="0">
                  </div>
                  <div class="col-md-6">
                    <label for="currency">Валюта *</label>
                    <select id="currency" name="currency" class="form-control">
                      <option selected disabled>Выберите валюту</option>
                      <? for ($i = 0; $i < count($this->currency); $i++): ?>
                      <option value="<?=$this->currency[$i]['currency_id']?>"><?=$this->currency[$i]['symbol']?></option>
                      <? endfor; ?>
                    </select>
                  </div>
                </div>

                <div class="mt-3">
                  <p>Состояние *</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="state_1" name="state" value="old" class="custom-control-input">
                    <label class="custom-control-label" for="state_1">Б/У</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="state_2" name="state" value="new" class="custom-control-input">
                    <label class="custom-control-label" for="state_2">Новое</label>
                  </div>
                </div>

              </div>
            </div>
            <hr class="mt-4">
            <button id="addLot" class="btn btn-primary mt-2" type="submit">Опубликовать</button>

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
