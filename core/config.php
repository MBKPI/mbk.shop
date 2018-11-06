<?php
	session_start();
	
	$conf_sitename = "MBK Shop";
	$conf_default_template = "Default";

	spl_autoload_register(function ($class) {
		require ROOT."/core/classes/{$class}.class.php";
	});
?>