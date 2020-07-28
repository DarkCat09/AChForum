<!DOCTYPE html>
<html>
	<?
	$pagetitle = "Страничка хэширования для администратора";
	include_once("tmpl/head.tpl");
	?>
	<body>
		<form action = "adminhash.php" method = "post">
			<input type = "text" name = "passwordToHash" placeholder = "Введите пароль" />
			<input type = "submit" value = "OK" />
		</form>
		<br />
		<?
		if (array_key_exists("passwordToHash", $_POST)) :
			$hash = password_hash(htmlspecialchars($_POST["passwordToHash"]), PASSWORD_DEFAULT);
			print("<br /><b>Хэш:</b> <code>".$hash."</code>");
		endif;
		?>
	</body>
</html>