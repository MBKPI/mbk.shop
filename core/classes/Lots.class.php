<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	class Lots {

		public static function getByCategory ($cat) {
			$db = new DB();
			$sel_cat = Category::getByName($cat);

			$sel_lots = $db->conn()->prepare("SELECT * FROM `lots` WHERE `category_id`=:cat ORDER BY `lot_id` DESC");
			$sel_lots->bindParam(":cat", $sel_cat['category_id']);
			$sel_lots->execute();

			$sel_lots = $sel_lots->fetchAll();
			for($i = 0; $i < count($sel_lots); $i++) {
				$sel_lots[$i]['user_detail'] = User::get($sel_lots[$i]['user_id']);
				$sel_lots[$i]['category_detail'] = Category::getById($sel_lots[$i]['category_id']);
				$sel_lots[$i]['currency_detail'] = Currency::getById($sel_lots[$i]['currency_id']);
			}
			return $sel_lots;
		}

		public static function getAll () {
			$db = new DB();

			$sel_lots = $db->conn()->query("SELECT * FROM `lots` ORDER BY `lot_id` DESC");
			$sel_lots = $sel_lots->fetchAll();
			for($i = 0; $i < count($sel_lots); $i++) {
				$sel_lots[$i]['user_detail'] = User::get($sel_lots[$i]['user_id']);
				$sel_lots[$i]['category_detail'] = Category::getById($sel_lots[$i]['category_id']);
				$sel_lots[$i]['currency_detail'] = Currency::getById($sel_lots[$i]['currency_id']);
			}

			return $sel_lots;
		}

		public static function getById($id) {
			$db = new DB();

			$sel_lots = $db->conn()->query("SELECT * FROM `lots` WHERE `lot_id`='{$id}'");
			$sel_lots = $sel_lots->fetch();
			$sel_lots['user_detail'] = User::get($sel_lots['user_id']);
			$sel_lots['category_detail'] = Category::getById($sel_lots['category_id']);
			$sel_lots['currency_detail'] = Currency::getById($sel_lots['currency_id']);

			return $sel_lots;
		}

		public static function getAllById($id) {
			$db = new DB();

			$sel_lots = $db->conn()->query("SELECT * FROM `lots` WHERE `user_id`='{$id}'");
			$sel_lots = $sel_lots->fetchAll();

			for ($i = 0; $i < count($sel_lots); $i++) {
				$sel_lots[$i]['user_detail'] = User::get($sel_lots[$i]['user_id']);
				$sel_lots[$i]['category_detail'] = Category::getById($sel_lots[$i]['category_id']);
				$sel_lots[$i]['currency_detail'] = Currency::getById($sel_lots[$i]['currency_id']);
			}

			return $sel_lots;
		}

		public static function getFavourites($user_id) {
			$db = new DB();

			$sel_fav = $db->conn()->prepare("SELECT * FROM `favourites` WHERE `user_id`=:user_id");
			$sel_fav->bindParam(":user_id", User::getId());
			$sel_fav->execute();
			$sel_fav = $sel_fav->fetchAll();

			for ($i = 0; $i < count($sel_fav); $i++) {
				$sel_fav[$i] = Lots::getById($sel_fav[$i]['lot_id']);
			}

			return $sel_fav;
		}

	}
?>
