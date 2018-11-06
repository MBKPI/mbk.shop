<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT."/core/config.php";

  $name = User::valid($name);
  $surname = User::valid($surname);
  $email = User::valid($email);
  $password = User::valid($password);
  $phone = User::valid($phone);

  if ($name != "" && $surname != "" && $email != "" && $password != "" && $phone != "") {
    $db = new DB();
    $sel_email = $db->conn()->prepare("SELECT * FROM `users` WHERE `email`=:email");
    $sel_email->bindParam(":email", $email);
    $sel_email = $sel_email->execute();

    $sel_email = $sel_email->fetch(PDO::FETCH_ASSOC);

    if ($sel_email['email'] != $email) {
      $password = md5($password);
      $ins_user = $db->conn()->prepare("INSERT INTO `users` (`name`, `surname`, `email`, `password`, `phone`) VALUES (:name, :surname, :email, :password, :phone)");
      $ins_user->bindParam(":name", $name);
      $ins_user->bindParam(":surname", $surname);
      $ins_user->bindParam(":email", $email);
      $ins_user->bindParam(":password", $password);
      $ins_user->bindParam(":phone", $phone);
      $ins_user = $ins_user->execute();

      if ($ins_user == true) {
        $sel_user = $db->conn()->prepare("SELECT * FROM `users` WHERE `email`=:email");
        $sel_user->bindParam(":email", $email);
        $sel_user = $sel_user->execute();
        $sel_user = $sel_user->fetch(PDO::FETCH_ASSOC);

        if ($sel_user['email'] == $email) {
          User::login($sel_user['user_id']);
          die(User::jsonAnswer(true));
        } else {
          die(User::jsonAnswer(false, "Ошибка, вы не зарегистрированы."));
        }
      } else {
        die(User::jsonAnswer(false, "Ошибка, вы не зарегистрированы."));
      }
    } else {
      die(User::jsonAnswer(false, "Такой e-mail уже зарегистрирован."));
    }
  } else {
    die(User::jsonAnswer(false, "Заполните все поля"));
  }
?>
