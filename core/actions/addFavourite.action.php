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

    if ($sel_lot['lot_id'] != $lot_id && $sel_lot['user_id'] != User::getId()) {
			$date = date("d-m-Y, в H:i");
      $ins_lot = $db->conn()->prepare("INSERT INTO `favourites` (`lot_id`, `user_id`, `date`) VALUES (:lot_id, :user_id, :date)");
      $ins_lot->bindParam(":lot_id", $lot_id);
      $ins_lot->bindParam(":user_id", User::getId());
      $ins_lot->bindParam(":date", $date);
      $ins_lot->execute();

      if ($ins_lot == true) {
        die(User::jsonAnswer(true));
      } else {
        die(User::jsonAnswer(false, "Ошибка, в список избранных объявление не было добавлено"));
      }
    } else {
      die(User::jsonAnswer(false, "Объявление уже есть в списке Избранного "));
    }
  } else {
    die(User::jsonAnswer(false, "Ошибка, пустой параметр"));
  }
?>
