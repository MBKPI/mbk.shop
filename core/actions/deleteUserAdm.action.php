<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT."/core/config.php";

  $user_id = User::valid($_POST['user_id']);

  if (User::isAdmin() == false) { die("Доступ запрещён."); }

  if ($user_id != "") {

    $db = new DB();
    $sel_user = $db->conn()->prepare("SELECT * FROM `users` WHERE `user_id`=:user_id");
    $sel_user->bindParam(":user_id", $user_id);
    $sel_user->execute();
    $sel_user = $sel_user->fetch();

    if ($sel_user['user_id'] == $user_id) {
      if ($user_id != User::getId()) {
        $del_user = $db->conn()->prepare("DELETE FROM `users` WHERE `user_id`=:user_id");
        $del_user->bindParam(":user_id", $user_id);
        $del_user->execute();
        if ($del_user == true) {
          die(User::jsonAnswer(true, "Вы успешно удалили объявление."));
        } else {
          die(User::jsonAnswer(false, "Произошла ошибка, повторите попытку позже..."));
        }
      } else {
        die(User::jsonAnswer(false, "Нельзя удалить самого себя."));
      }
    } else {
      die(User::jsonAnswer(false, "Такого объявления не существует."));
    }
  } else {
    die(User::jsonAnswer(false, "Не указан параметр."));
  }
?>
