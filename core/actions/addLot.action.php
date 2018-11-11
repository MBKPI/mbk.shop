<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	$title = User::valid($_POST['title']);
	$category = User::valid($_POST['category']);
	$about = User::valid($_POST['about']);
	$photo = $_FILES['photo'];
  $price = User::valid($_POST['price']);
	$currency = $_POST['currency'];
	$state = $_POST['state'];

  if (User::isLogged() == false) { die(User::jsonAnswer(false, "Вы не вошли в систему.")); }

	if ($title != "" && $category != "" && $about != "" && $photo != "" && $price != "" && $currency != "" && $state != "") {

		$filename = basename($photo['name']);
		if (move_uploaded_file($photo['tmp_name'], ROOT."/uploads/lots/".$filename)) {

			switch ($state) {
				case 'old': $state = 'Б/у';	break;
				case 'new': $state = 'Новый';	break;
			}

			$date = "фывфыв";

			$db = new DB();
	    $ins_lot = $db->conn()->prepare("INSERT INTO `lots` (`user_id`, `title`, `about`, `price`, `currency_id`, `image`, `state`, `category_id`, `date`) VALUES (:user_id, :title, :about, :price, :currency_id, :image, :state, :category_id, :dt)");
	    $ins_lot->bindParam(":user_id", $_SESSION['user_id']);
			$ins_lot->bindParam(":title", $title);
			$ins_lot->bindParam(":about", $about);
			$ins_lot->bindParam(":price", $price);
			$ins_lot->bindParam(":currency_id", $currency);
			$ins_lot->bindParam(":image", $filename);
			$ins_lot->bindParam(":state", $state);
			$ins_lot->bindParam(":category_id", $category);
			$ins_lot->bindParam(":dt", $date);

	    $ins_lot = $ins_lot->execute();

	    if ($ins_lot == true) {
	        die(User::jsonAnswer(true, "Вы успешно опубликовали объявление!"));
	    } else {
	        die(User::jsonAnswer(false, "Ошибка, повторите запрос позже."));
	    }
		} else {
			die(User::jsonAnswer(false, "Ошибка, фотография не была загружена!"));
		}

	} else {
		die(User::jsonAnswer(false, "Заполните все поля!"));
	}
?>
