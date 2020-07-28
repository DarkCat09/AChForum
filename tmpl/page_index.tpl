<!DOCTYPE html>
<html>
	<?
	$pagetitle = "ACh Форум";
	include_once("tmpl/head.tpl");
	?>
	<body>
		<!-- Login Dialog -->
		<div class = "stylized-dialog-bg" id = "login-dialog">
			<div class = "stylized-dialog">
				<?
				$register_user = ($_GET["reg"] == "1") ? 1 : 0;
				require_once("tmpl/loginform.tpl");
				?>
			</div>
		</div>
		<!-- "Wait, while administrator unlock your profile" Dialog -->
		<div class = "stylized-dialog-bg" id = "wait-unlock-dialog">
			<div class = "stylized-dialog">
				<h3>Учётная запись зарегистрирована!</h3>
				Пожалуйста, подождите, пока администратор форума разблокирует Ваш профиль.<br />
				<a href = "#" class = "stylized-button-1">&nbsp;OK&nbsp;</a>
			</div>
		</div>
		<!-- Error Dialogs -->
		<div class = "stylized-dialog-bg" id = "captcha-error-dialog">
			<div class = "stylized-dialog">
				<h3>Произошла ошибка!</h3>
				Вы неверно ввели капчу (числа с картинки "я не робот").
				Если Вы верно написали числа, но видите это сообщение, загляните на
				<a href = "index.php?action=support" target = "_blank">страницу поддержки</a>.
			</div>
		</div>
		<div class = "stylized-dialog-bg" id = "db-error-dialog">
			<div class = "stylized-dialog">
				<h3>Ошибка БД!</h3>
				Произошла ошибка при подключении к базе данных. Скорее всего, это мы что-то накуралесили.
				Подождите, пожалуйста, 2 минуты и попробуйте ещё раз. Если снова увидите это сообщение, напишите администратору об этом на почту: 
				<?
				print('<a href = "mailto:a.chechkenev@yandex.ru?subject=Ошибка%20БД">a.chechkenev@yandex.ru</a>');
				?>
			</div>
		</div>
		<div class = "stylized-dialog-bg" id = "user-exists-error-dialog">
			<div class = "stylized-dialog">
				<h3>Ошибка регистрации!</h3>
				Пользователь с таким именем уже существует.
			</div>
		</div>
		<div class = "stylized-dialog-bg" id = "login-are-incr-dialog">
			<div class = "stylized-dialog">
				<h3>Ошибка авторизации!</h3>
				Неверное имя пользователя или пароль.
			</div>
		</div>

		<? include_once("tmpl/topmenu.tpl"); ?>
		<div class = "main-content">
			<!-- Main Content - PHP with loading trheads from SQL, Hints... -->
			<div class = "topic-div">
				<?
				$topics = array(
					"Моя Тема",
					"Болталка",
					"Правила ресурса"
				);
				foreach ($topics as $topic) {
					print('<a href = "topic.php?name='.$topic.'">'.$topic.'</a><br />');
				}
				?>
			</div>
			<br />
			<div class = "hint">
				<span class = "hint-heading">Подсказка</span>
				<span class = "close" onclick = "closeHint()" title = "Закрыть">X</span>
				<br />
				<span class = "hint-body"><? include("tmpl/randhint.tpl"); ?></span>
			</div>
		</div>
		<script src = "js/script.js"></script>
	</body>
</html>