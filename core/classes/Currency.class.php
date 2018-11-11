<?php
  class Currency {

    public static function getById($id) {
      $db = new DB();

      $sel_cur = $db->conn()->prepare("SELECT * FROM `currency` WHERE `currency_id`=:id");
      $sel_cur->bindParam(":id", $id);
      $sel_cur->execute();

      $sel_cur = $sel_cur->fetch();

      return $sel_cur;
    }

    public static function getAll() {
      $db = new DB();

      $sel_cur = $db->conn()->prepare("SELECT * FROM `currency` ORDER BY `name` ASC");
      $sel_cur->execute();

      $sel_cur = $sel_cur->fetchAll();

      return $sel_cur;
    }

  }
?>
