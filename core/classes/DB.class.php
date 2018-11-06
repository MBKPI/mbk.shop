<?php 
	class DB {

		private $pdo;

		public function __construct() {
			$dsn = "mysql:host=localhost;dbname=mbk_shop_user;charset=utf8";
			$test_pdo = new PDO($dsn, "olga", "olga");

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