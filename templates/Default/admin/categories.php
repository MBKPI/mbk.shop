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

  <div class="modal fade" id="confirmDel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Подтверждение действия</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Вы действительно хотите удалить категорию?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет, оставить</button>
          <button type="button" id="confirmBtnDelete" class="btn btn-primary">Да, удалить</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <nav class="nav nav-pills flex-column flex-sm-row">
          <a class="flex-sm-fill text-sm-center nav-link" href="/admin"><i class="fas fa-home"></i> Главная</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="/admin/users"><i class="fas fa-users"></i> Пользователи</a>
          <a class="flex-sm-fill text-sm-center nav-link active" href="/admin/categories"><i class="fas fa-list-alt"></i> Категории</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="/admin/lots"><i class="fas fa-box"></i> Объявления</a>
          <a class="flex-sm-fill text-sm-center nav-link disabled" href="/logout"><i class="fas fa-sign-out-alt"></i> Выйти</a>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/admin">Админ-панель</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категории</li>
          </ol>
        </nav>
      </div>

      <div class="col-md-12 mt-2">
        <div class="d-flex justify-content-between align-items-center">
          <h4>Найдено категорий: <?=count($this->categories)?></h4>
          <a href="/admin/categories/add"><i class="fas fa-plus"></i> Добавить категорию</a>
        </div>
      </div>

      <div class="col-md-12 mt-1">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Название (рус.)</th>
                <th scope="col">Название (англ.)</th>
                <th scope="col">Родительская категория</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
          <? for($i = 0; $i < count($this->categories); $i++): ?>
              <tr>
                <th scope="row"><?=$this->categories[$i]['category_id']?></th>
                <td><?=$this->categories[$i]['name']?></td>
                <td><?=$this->categories[$i]['name_eng']?></td>
                <td><?=$this->categories[$i]['parent_category']?></td>
                <td>
                  <div class="btn-group btn-group-sm" role="group">
                    <a class="btn btn-primary" href="/admin/categories/edit/<?=$this->categories[$i]['category_id']?>">Редактировать</a>
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDel" data-whatever="<?=$this->categories[$i]['category_id']?>">Удалить</button>
                  </div>
                </td>
              </tr>
          <? endfor; ?>
            </tbody>
          </table>
        </div>

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>


      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="<?=$this->path?>/js/admin.js"></script>
</body>
</html>
