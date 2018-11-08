<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT."/core/config.php";

  $lot_id = User::valid($_POST['lot_id']);

  if ($lot_id != "") {
    $db = new DB();
    $sel_lot = $db->conn()->prepare("SELECT * FROM `lots` WHERE `lot_id`=:lot_id");
    $sel_lot->bindParam(":lot_id", $lot_id);
    $sel_lot->execute();
    $sel_lot = $sel_lot->fetch();

    if ($sel_lot['lot_id'] == $lot_id) {
      if ($sel_lot['user_id'] == User::getId() || User::isAdmin() == true) {
        $del_lot = $db->conn()->prepare("DELETE FROM `lots` WHERE `lot_id`=:lot_id");
        $del_lot->bindParam(":lot_id", $lot_id);
        $del_lot->execute();
        if ($del_lot == true) {
          die(User::jsonAnswer(true, "Вы успешно удалили объявление."));
        } else {
          die(User::jsonAnswer(false, "Произошла ошибка, повторите попытку позже..."));
        }
      } else {
        die(User::jsonAnswer(false, "Это объявление Вам не пренадлежит!"));
      }
    } else {
      die(User::jsonAnswer(false, "Такого объявления не существует."));
    }
  } else {
    die(User::jsonAnswer(false, "Не указан параметр."));
  }
?>
