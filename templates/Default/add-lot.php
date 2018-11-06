<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$this->title?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$this->path?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?=$this->path?>/css/style_reg.css">
</head>
<body>

  <header>
    <div class="container">
        <div class="content">
          <div class="row justify-content-center">
            <div>
                <p id="logo" ><a href="/">MBK<small class="text-muted">shop</small></a></p>
                <p id="logo">Добавляем объявление</p>
            </div>
          </div>
        </div>
    </div>
  </header>
    <section class="registr">
        <div class="cotainer">
            <div class="content">
                  <form class="form_add mx-auto mt-5" method="post" id="addLotForm">
                    <input type="text" name="title" placeholder="Название товара" required>
                    <input type="text" name="price" placeholder="Цена" required>
                    <textarea name="about" rows="4" cols="35" placeholder=" Описание"></textarea>
                    <button id="addLot">Добавить Объявление</button>
                  </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?=$this->path?>/js/main.js" charset="utf-8"></script>
  </body>
</html>
