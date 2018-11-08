<?php
  class Admin {
    public static function getUsers () {
      $db = new DB();
      $sel_users = $db->conn()->query("SELECT * FROM `users` ORDER BY `user_id` DESC");
      $sel_users = $sel_users->fetchAll();

      return $sel_users;
    }
  }
?>
