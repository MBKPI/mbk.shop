<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	try {

		$tpl = new Template($conf_default_template);
		$tpl->setVar("path", "/templates/{$conf_default_template}");
		$page = $_GET['page'];

		switch ($page) {
			case 'validation':
				if (User::isLogged() == true) { header("Location: /"); }
				$tpl->setVar("title", $conf_sitename);
				$tpl->load("validation");
				break;
			case 'add':
				if (User::isLogged() == false) { header("Location: /validation"); }
				$tpl->setVar("title", $conf_sitename." - Добавить объявление");
				$tpl->load("add-lot");
				break;
			case 'profile':
				if (User::isLogged() == false) { header("Location: /validation"); }
				$tpl->setVar("title", $conf_sitename." - Профиль");
				$tpl->setVar("user", User::get());
				$tpl->setVar("lots", Lots::get($_SESSION['user_id']));
				$tpl->load("profile");
				break;
			case 'logout':
				User::logout();
				break;
			
			default:
				$tpl->setVar("title", $conf_sitename);
				$tpl->setVar("lots", Lots::get());
				$tpl->load("index");
				break;
		}
	} catch(Exception $e) {
		die($e->getMessage());
	}
?>