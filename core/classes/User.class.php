<?php 
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	class User {

		public static function get() {
			$db = new DB();

			$sel_user = $db->conn()->prepare("SELECT * FROM `users` WHERE `user_id`=:user_id");
			$sel_user->bindParam(":user_id", $_SESSION['user_id']);
			$sel_user->execute();
			$sel_user = $sel_user->fetch(PDO::FETCH_ASSOC);

			return $sel_user;
		}

		public static function isLogged() {
			if ($_SESSION['user_id'] == NULL) {
				return false;
			} else {
				return true;
			}
		}

		public static function login ($user_id) {
			$_SESSION['user_id'] = $user_id;
		}

		public static function logout() {
			unset($_SESSION['user_id']);
			header("Location: /");
		}

		public static function jsonAnswer($success, $message = "") {
			$arr = array(
				'success' => $success,
				'message' => $message
			);

			return json_encode($arr);
		}
	}
?>