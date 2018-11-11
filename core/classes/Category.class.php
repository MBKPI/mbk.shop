<?php
  class Category {

    public static function getAll () {
      $db = new DB();

      $sel_cat = $db->conn()->prepare("SELECT * FROM `categories` ORDER BY `name` ASC");
      $sel_cat->execute();
      $sel_cat = $sel_cat->fetchAll();

      return $sel_cat;
    }

    public static function getByName ($name) {
      $db = new DB();

      $sel_cat = $db->conn()->prepare("SELECT * FROM `categories` WHERE `name_eng`=:name_eng");
      $sel_cat->bindParam(":name_eng", $name);
      $sel_cat->execute();
      $sel_cat = $sel_cat->fetch();
      return $sel_cat;
    }

    public static function getById($id) {
      $db = new DB();

      $sel_cat = $db->conn()->prepare("SELECT * FROM `categories` WHERE `category_id`=:cat_id");
      $sel_cat->bindParam(":cat_id", $id);
      $sel_cat->execute();
      $sel_cat = $sel_cat->fetch();

      return $sel_cat;
    }

  }
?>
