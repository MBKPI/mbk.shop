<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require ROOT."/core/config.php";

	try {

    if (User::isAdmin() == false) { throw new Exception("Вы не администратор."); }

		$tpl = new Template($conf_default_template."/admin");
		$tpl->setVar("path", "/templates/{$conf_default_template}");
		$page = $_GET['page'];

		switch ($page) {
      case 'users':
        $tpl->setVar("title", "ADM CP - Все пользователи");
        $tpl->setVar("users", User::getAll());
        $tpl->load("users");
        break;
			case 'edit-user':
				$tpl->setVar("title", "ADM CP - Редактирование профиля");
				if (isset($_GET['user_id'])) {
					$tpl->setVar("user", User::get($_GET['user_id']));
				}
				$tpl->load("edit-user");
				break;
      case 'lots':
        $tpl->setVar("title", "ADM CP - Все объявления");
				$tpl->setVar("lots", Admin::getLots());
        $tpl->load("lots");
        break;
			case 'edit-lot':
				$tpl->setVar("title", "ADM CP - Редактирование объявления");
				$tpl->setVar("user", User::get());
				$tpl->setVar("users", User::getAll());
				$tpl->setVar("lot", Lots::getById($_GET['lot_id']));
				$tpl->load("edit-lot");
				break;
			case 'categories':
				$tpl->setVar("title", "ADM CP - Все категории");
				$tpl->setVar("categories", Category::getAll());
				$tpl->load("categories");
				break;
			default:
				$tpl->setVar("title", $conf_sitename);
				$tpl->setVar("count", Admin::getCount());
				$tpl->load("index");
				break;
		}
	} catch(Exception $e) {
		die($e->getMessage());
	}
?>
