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

  <div class="modal fade" id="confirmDelLot" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Подтверждение действия</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Вы действительно хотите удалить объявление?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет, оставить</button>
          <button type="button" id="confirmBtnDelLot" class="btn btn-primary">Да, удалить</button>
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
          <a class="flex-sm-fill text-sm-center nav-link" href="/admin/categories"><i class="fas fa-list-alt"></i> Категории</a>
          <a class="flex-sm-fill text-sm-center nav-link active" href="/admin/lots"><i class="fas fa-box"></i> Объявления</a>
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
            <li class="breadcrumb-item active" aria-current="page">Объявления</li>
          </ol>
        </nav>
      </div>

      <div class="col-md-12 mt-2">
        <div class="d-flex justify-content-between align-items-center">
          <h4>Найдено объявлений: <?=count($this->lots)?></h4>
        </div>
      </div>

      <div class="col-md-12 mt-1">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Цена (грн.)</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
          <? for($i = 0; $i < count($this->lots); $i++): ?>
              <tr>
                <th scope="row"><?=$this->lots[$i]['lot_id']?></th>
                <td><a href="/admin/users/edit/<?=$this->lots[$i]['user_id']?>"><?=$this->lots[$i]['username']?></a></td>
                <td><?=$this->lots[$i]['title']?></td>
                <td><?=$this->lots[$i]['about']?></td>
                <td><?=$this->lots[$i]['price']?></td>
                <td>
                  <div class="btn-group btn-group-sm" role="group">
                    <a class="btn btn-primary" href="/admin/lots/edit/<?=$this->lots[$i]['lot_id']?>">Редактировать</a>
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDelLot" data-whatever="<?=$this->lots[$i]['lot_id']?>">Удалить</button>
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
