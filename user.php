<!DOCTYPE html>
<html>
	<?
	$pagetitle = "Информация о пользователе";
	include_once("tmpl/head.tpl");
	?>
	<body>
		<? include_once("tmpl/topmenu.tpl"); ?>
		<div class = "main-content">
			<? print("Пользователь N".$_GET["num"]); ?>
		</div>
	</body>
</html>