<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	try {

		$tpl = new Template($conf_default_template);
		$tpl->setVar("path", "/templates/{$conf_default_template}");
		$page = $_GET['page'];

		switch ($page) {
			case 'register':
				if (User::isLogged() == true) { header("Location: /"); }
				$tpl->setVar("title", $conf_sitename);
				$tpl->load("register");
				break;
			case 'login':
				if (User::isLogged() == true) { header("Location: /"); }
				$tpl->setVar("title", $conf_sitename);
				$tpl->load("login");
				break;
			case 'lostpassword':
				if (User::isLogged() == true) { header("Location: /"); }
				$tpl->setVar("title", $conf_sitename);
				$tpl->load("lostpassword");
				break;
			case 'add':
				if (User::isLogged() == false) { header("Location: /validation"); }
				$tpl->setVar("title", $conf_sitename." - Добавить объявление");
				$tpl->setVar("user", User::get());
				$tpl->setVar("categories", Category::getAll());
				$tpl->setVar("currency", Currency::getAll());
				$tpl->load("add-lot");
				break;
			case 'profile':
				if (User::isLogged() == false) { header("Location: /validation"); }
				$tpl->setVar("title", $conf_sitename." - Профиль");
				$tpl->setVar("user", User::get());
				$tpl->setVar("lots", Lots::get(User::getId()));
				$tpl->load("profile");
				break;
			case 'logout':
				User::logout();
				break;
			case 'lot':
				$lot = Lots::getById($_GET['lot_id']);
				$tpl->setVar("title", $lot['title']);
				$tpl->setVar("lot", $lot);
				$tpl->setVar("user", User::get());
				$tpl->load("lot");
				break;
			default:
				if ($_GET['category'] != null) {
					$cat = Category::getByName($_GET['category']);
					$tpl->setVar("lots", Lots::getByCategory($_GET['category']));
					$title = "Категория ".$cat['name'];
				} else {
					$tpl->setVar("lots", Lots::getAll());
					$title = $conf_sitename;
				}
				$tpl->setVar("title", $title);
				$tpl->setVar("user", User::get());
				$tpl->load("index");
				break;
		}
	} catch(Exception $e) {
		die($e->getMessage());
	}
?>
