<form action = "login_script.php" method = "post" class = "loginform">
	<a href = "#" class = "close text-link">X</a>
	<?
	if ($register_user === 1) print('<legend>Почта</legend> <input type = "email" name = "usermail" required = "required" />');
	?>
	<legend>Имя пользователя</legend> <input type = "text" name = "username" required = "required" />
	<legend>Пароль</legend> <input type = "password" name = "userpass" required = "required" />
	<br />
	<legend>Проверка "Я не робот"</legend> <img src = "captcha.php" /><br />
	<input type = "number" name = "cptnums" placeholder = "Введите число с картинки" required = "required" />
	<br /><br />
	<?
	print(($register_user === 1) ? '<input type = "submit" value = "OK" />' : '<input type = "submit" value = "Войти" />');
	print(($register_user === 1) ? '' :
		'&nbsp;<button id = "register"><a href = "index.php?reg=1#login-dialog" class = "text-link">Зарегистрироваться</a></button>');
	?>
</form>