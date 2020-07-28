<!DOCTYPE html>
<html>
	<?
	$pagetitle = "Тема ".$_GET["name"];
	include_once("tmpl/head.tpl");
	?>
	<body>
		<? include_once("tmpl/topmenu.tpl"); ?>
		<div class = "main-content">
			<?
			$posts = array("");
			print("<h1>".$_GET["name"]."</h1>");
			if (array_key_exists("descr", $_GET)) print("<h4>".$_GET["descr"]."</h4>");
			if ($_GET["name"] == "Моя Тема") :
				$posts = array(
					array(
						message => '<h3>Проверочный пост</h3><br />
						<b>Жирный текст</b><br />
						<i>Возможно, курсив</i><br />
						<u>Невозможно, подчёркнутый</u><br />
						<s>Совсем глупо, зачёркнутый</s><br />
						<button class = "stylized-button-2">Красивая кнопочка!</button><br />
						<a class = "stylized-button-6>Скачать что-то</a><br />',
						author => "Admin"
					),
					array(
						message => 'Здравствуйте! (2-ой пост)',
						author => "Кто-то"
					)
				);
			endif;
			?>
			<ul id = "posts-container">
				<?
				foreach ($posts as $post) {
					print("<li>".$post["message"]."</li>");
					#print("<li>".var_dump($post)."</li>"); // for debug
				}
				unset($post);
				?>
			</ul>
		</div>
	</body>
</html>