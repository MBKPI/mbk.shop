<?php
  class Admin {

    public static function getCount() {
      $db = new DB();

      $sel_users = $db->conn()->query("SELECT COUNT(*) as `count` FROM `users`");
      $sel_users = $sel_users->fetch();

      $sel_lots = $db->conn()->query("SELECT COUNT(*) as `count` FROM `lots`");
      $sel_lots = $sel_lots->fetch();

      $res['users'] = $sel_users['count'];
      $res['lots'] = $sel_lots['count'];

      return $res;
    }

    public static function getUsers () {
      $db = new DB();
      $sel_users = $db->conn()->query("SELECT * FROM `users` ORDER BY `user_id` DESC");
      $sel_users = $sel_users->fetchAll();

      return $sel_users;
    }

    public static function getLots() {
      $db = new DB();
      $sel_lots = $db->conn()->query("SELECT * FROM `lots` ORDER BY `lot_id` DESC");
      $sel_lots = $sel_lots->fetchAll();

      for ($i = 0; $i < count($sel_lots); $i++) {
        $user = User::get($sel_lots[$i]['user_id']);
        $sel_lots[$i]['username'] = $user['name']." ".$user['surname'];
      }

      return $sel_lots;
    }
  }
?>
