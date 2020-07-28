<?
if ($_GET["action"] == "showtopic") {
	header("Location: ./topic.php?name=".$_GET["name"]);
}
elseif ($_GET["action"] == "showuser") {
	header("Location: ./user.php?num=".$_GET["num"]);
}
elseif ($_GET["action"] == "login") {
	header("Location: ./index.php#login-dialog");
	require_once("tmpl/index_page.tpl");
}
elseif ($_GET["action"] == "register") {
	header("Location: ./index.php?reg=1#login-dialog");
}
elseif ($_GET["action"] == "support") {
	require_once("tmpl/page_support.tpl");
}
else {
	require_once("tmpl/page_index.tpl");
}
?>