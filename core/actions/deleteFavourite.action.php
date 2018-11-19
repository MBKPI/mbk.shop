<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT."/core/config.php";

  $lot_id = User::valid($_POST['lot_id']);

  if (User::isLogged() == false) { die("Требуется авторизация."); }

  if ($lot_id != "") {
    $db = new DB();

    $sel_lot = $db->conn()->prepare("SELECT * FROM `favourites` WHERE `lot_id`=:lot_id AND `user_id`=:user_id");
    $sel_lot->bindParam(":lot_id", $lot_id);
    $sel_lot->bindParam(":user_id", User::getId());
    $sel_lot->execute();

    $sel_lot = $sel_lot->fetch();

    if ($sel_lot['lot_id'] == $lot_id && $sel_lot['user_id'] == User::getId()) {
			$date = date("d-m-Y, в H:i");
      $del_lot = $db->conn()->prepare("DELETE FROM `favourites` WHERE `lot_id`=:lot_id");
      $del_lot->bindParam(":lot_id", $lot_id);
      $del_lot->execute();

      if ($del_lot == true) {
        die(User::jsonAnswer(true));
      } else {
        die(User::jsonAnswer(false, "Ошибка, в список избранных объявление не было удалено"));
      }
    } else {
      die(User::jsonAnswer(false, "Такого объявления не существует в вашем списке"));
    }
  } else {
    die(User::jsonAnswer(false, "Ошибка, пустой параметр"));
  }
?>
