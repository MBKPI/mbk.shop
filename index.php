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
			case 'mylots':
				if (User::isLogged() == false) { header("Location: /validation"); }
				$tpl->setVar("title", $conf_sitename." - Мои объявления");
				$tpl->setVar("user", User::get());
				$tpl->setVar("lots", Lots::getAllById(User::getId()));
				$tpl->load("mylots");
				break;
			case 'favourites':
				if (User::isLogged() == false) { header("Location: /validation"); }
				$tpl->setVar("title", $conf_sitename." - Избранное");
				$tpl->setVar("user", User::get());
				$tpl->setVar("fav_lots", Lots::getFavourites(User::getId()));
				$tpl->load("favourites");
				break;
			case 'settings':
				if (User::isLogged() == false) { header("Location: /validation"); }
				$tpl->setVar("title", $conf_sitename." - Настройки");
				$tpl->setVar("user", User::get());
				$tpl->load("settings");
				break;
			case 'logout':
				User::logout();
				break;
			case 'lot':
				Lots::viewed($_GET['lot_id']);
				$lot = Lots::getById($_GET['lot_id']);
				$tpl->setVar("title", $lot['title']);
				$tpl->setVar("lot", $lot);
				$tpl->setVar("user", User::get());
				$tpl->load("lot");
				break;
			case 'search':
				$tpl->setVar("title", "Поиск по запросу");
				$tpl->setVar("user", User::get());
				$tpl->setVar("categories", Category::getAll());
				$tpl->setVar("current_cat", Category::getByName($_GET['category']));
				$tpl->setVar("lots", Lots::search($_GET['query'], $_GET['category'], $_GET['param']));
				$tpl->setVar("query", $_GET['query']);
				$tpl->load("search");
				break;
			default:
				$tpl->setVar("lots", Lots::getAll());
				$tpl->setVar("top_lots", Lots::getAllByParam("views", 6));
				$tpl->setVar("title", $conf_sitename);
				$tpl->setVar("user", User::get());
				$tpl->setVar("categories", Category::getAll());
				$tpl->load("index");
				break;
		}
	} catch(Exception $e) {
		die($e->getMessage());
	}
?>
