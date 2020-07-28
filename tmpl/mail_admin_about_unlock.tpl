<?
$mail_headers = array(
	'MIME-version' => '1.0',
	'Content-type' => 'text/html; charset=utf-8',
	'From' => 'AChForum <no-reply@achforum1.ru>'
);
$mail_unlock_message = '
<body>
	<h3 style = "font-family: \\"Tahoma\\";">Зарегистрирован новый пользователь под ником '.htmlentities($_POST["username"], ENT_QUOTES | ENT_SUBSTITUTE).'</h3>
	<a href = "http://localhost/Tools/PhpMyAdmin/index.php?db=achforum_db">Открыть СУБД и разблокировать</a>
	<br />
</body>
';
mail('a.chechkenev@yandex.ru', 'Зарегистрирован новый пользователь', $mail_unlock_message, $mail_headers);
?>