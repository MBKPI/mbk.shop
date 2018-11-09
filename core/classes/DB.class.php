<?php
	class DB {

		private $pdo;

		public function __construct() {
			$dsn = "mysql:host=localhost;dbname=mbk_shop_user;charset=utf8";
			$opt = [
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => false,
			];
			$test_pdo = new PDO($dsn, "olga", "olga", $opt);

			if ($test_pdo == true) {
				$this->pdo = $test_pdo;
			} else {
				throw new Exception("Ошибка подключения к базе данных.");
			}
		}

		public function conn () {
			return $this->pdo;
		}

	}
?>
