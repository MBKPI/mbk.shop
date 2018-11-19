<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

  <title><?=$this->title?></title>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <nav class="nav nav-pills flex-column flex-sm-row">
          <a class="flex-sm-fill text-sm-center nav-link" href="/admin"><i class="fas fa-home"></i> Главная</a>
          <a class="flex-sm-fill text-sm-center nav-link active" href="/admin/users"><i class="fas fa-lots"></i> Пользователи</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="/admin/lots"><i class="fas fa-box"></i> Объявления</a>
          <a class="flex-sm-fill text-sm-center nav-link disabled" href="/logout"><i class="fas fa-sign-out-alt"></i> Выйти</a>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-5">
        <? if ($this->category != null): ?>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/admin">Админ-панель</a></li>
            <li class="breadcrumb-item"><a href="/admin/users">Категории</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$this->category['name']?></li>
          </ol>
        </nav>

        <form id="add-category" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Название категории (рус.)</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="<?=$this->category['name']?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="surname">Название категории (англ.)</label>
                <input type="text" class="form-control" id="surname" name="name_eng" placeholder="<?=$this->category['name_eng']?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputState">Родительская категория</label>
                <select id="inputState" name="parent_cat" class="form-control">
                  <option value="NULL">Создать новую</option>
                  <? for($i = 0; $i < count($this->categories); $i++): ?>
                  <option value="<?=$this->categories[$i]['category_id']?>"><?=$this->categories[$i]['name']?></option>
                  <? endfor; ?>
                </select>
              </div>
            </div>
          </div>

          <button id="addCategoryBtn" class="btn btn-primary">Сохранить изменения</button>
          <a href="/admin/categories" class="btn btn-default">Назад</a>
        </form>
        <? else: ?>
        <div class="col-md-4 mx-auto text-center">
          <p class="font-weight-bold">Такой категории не существует.</p>
          <a href="/admin/categories" class="btn btn-default">Назад</a>
        </div>
        <? endif; ?>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="<?=$this->path?>/js/admin.js"></script>
</body>
</html>
