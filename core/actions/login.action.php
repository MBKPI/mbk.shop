<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	$email = trim(htmlspecialchars($_POST['email']));
	$password = trim(htmlspecialchars($_POST['password']));

	if ($email != "" && $password != "") {

		$db = new DB();
		$sel_email = $db->conn()->prepare("SELECT * FROM `users` WHERE `email`=:email");
		$sel_email->bindParam(":email", $email);
		$sel_email->execute();

		$res_email = $sel_email->fetch(PDO::FETCH_ASSOC);

		if ($res_email['email'] == $email) {
			$password = md5($password);
			if ($res_email['password'] == $password) {
				User::login($res_email['user_id']);
				die(User::jsonAnswer(true));
			} else {
				die(User::jsonAnswer(false, "Такого пользователя не существует"));
			}
		} else {
			die(User::jsonAnswer(false, "Такого пользователя не существует"));
		}

	} else {
		die(User::jsonAnswer(false, "Заполните все поля!"));
	}
?>
