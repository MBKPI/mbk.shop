<!DOCTYPE html>
<html>
<head>
	<title><?=$this->title?></title>
	<link rel="stylesheet" type="text/css" href="<?=$this->path?>/css/style.css">
</head>
<body>
	<form method="POST" action="/core/actions/login.action.php">
		<input type="email" name="email" placeholder="E-Mail...">
		<input type="password" name="password" placeholder="Password...">
		<input type="submit" name="loggin" value="Войти">
	</form>
</body>
</html>