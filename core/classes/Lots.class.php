<?php 
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	class Lots {
		public static function get($id = "") {
			$db = new DB();

			if ($id == "") {
				$sel_lots = $db->conn()->query("SELECT * FROM `lots` ORDER BY `lot_id` DESC");
			} else {
				$sel_lots = $db->conn()->query("SELECT * FROM `lots` WHERE `user_id`='{$id}'");
			}
			$sel_lots = $sel_lots->fetchAll();

			return $sel_lots;
		}
	}
?>