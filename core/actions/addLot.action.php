<?php 
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	$title = trim(htmlspecialchars($_POST['title']));
    $price = trim(htmlspecialchars($_POST['price']));
    $about = trim(htmlspecialchars($_POST['about']));

    if (User::isLogged() == false) { die(User::jsonAnswer(false, "Вы не вошли в систему.")); }

	if ($title != "" && $price != "" && $about != "") {

		$db = new DB();
        $ins_lot = $db->conn()->prepare("INSERT INTO `lots` (`user_id`, `title`, `about`, `price`) VALUES (:user_id, :title, :about, :price)");
        $ins_lot->bindParam(":user_id", $_SESSION['user_id']);
        $ins_lot->bindParam(":title", $title);
        $ins_lot->bindParam(":about", $about);
        $ins_lot->bindParam(":price", $price);
        $ins_lot = $ins_lot->execute();
        
        if ($ins_lot == true) {
            die(User::jsonAnswer(true, "Вы успешно опубликовали объявление!"));
        } else {
            die(User::jsonAnswer(false, "Ошибка, повторите запрос позже."));
        }

	} else {
		die(User::jsonAnswer(false, "Заполните все поля!"));
	}
?>