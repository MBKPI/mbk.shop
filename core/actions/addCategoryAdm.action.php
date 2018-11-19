<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT."/core/config.php";

  if (User::isAdmin() == false) { User::jsonAnswer(false, "Вы не администратор."); }

  $name = User::valid($_POST['name']);
  $name_eng = User::valid($_POST['name_eng']);
  $parent_cat = User::valid($_POST['parent_cat']);

  if ($name != "" && $name_eng != "" && $parent_cat != "") {
    $db = new DB();

    $sel_cat = $db->conn()->prepare("SELECT * FROM `categories` WHERE `name_eng`=:name_eng");
    $sel_cat->bindParam(":name_eng", $name_eng);
    $sel_cat->execute();

    $sel_cat = $sel_cat->fetch();

    if ($parent_cat == 'NULL') {
      $parent_cat = NULL;
    }

    if ($sel_cat['name_eng'] != $name_eng) {
      $ins_cat = $db->conn()->prepare("INSERT INTO `categories` (`name`, `name_eng`, `parent_category`) VALUES (:name, :name_eng, :parent_category)");
      $ins_cat->bindParam(":name", $name);
      $ins_cat->bindParam(":name_eng", $name_eng);
      if ($parent_cat == 'NULL') {
        $ins_cat->bindParam(":parent_category", $parent_cat, PDO::PARAM_NULL);
      } else {
        $ins_cat->bindParam(":parent_category", $parent_cat);
      }
      $ins_cat->execute();

      if ($ins_cat == true) {
        die(User::jsonAnswer(true));
      } else {
        die(User::jsonAnswer(false, "Ошибка запроса, категория не добавлена."));
      }
    } else {
      die(User::jsonAnswer(false, "Такая категория уже существует."));
    }
  } else {
    die(User::jsonAnswer(false, "Ошибка, заполните все поля."));
  }

?>
