<?
session_start();
if ($_POST["cptnums"] != $_SESSION["cptrndnum"]) :
	header("Location: ./index.php#captcha-error-dialog");
else :
	require_once("password_compat/lib/password.php");
	$db_link = mysqli_connect("localhost", "root", "", "achforum_db");
	if ($db_link !== false) :
		if (array_key_exists("usermail", $_POST)) {
			# checking - are user exists?
			$result = mysqli_query($db_link, 'SELECT * FROM users WHERE name = "'.$_POST["username"].'"');
			if (mysqli_num_rows($result) > 0) header("Location: ./index.php#user-exists-error-dialog");
			mysqli_free_result($result);

			# ... if not, register user!
			$result = mysqli_query($db_link, "INSERT INTO users (name, email, password, reputation, warnings, blocked) VALUES (".$_POST["username"].", ".$_POST["usermail"].", ".password_hash($_POST["userpass"], PASSWORD_DEFAULT).", 0, 0, 1)");

			mysqli_free_result($result);
			mysqli_close($db_link);

			//include_once("tmpl/mail_admin_about_unlock.tpl");
			header("Location: ./index.php#wait-unlock-dialog");
		}
		else {
			# checking, that user exists and password is correct
			$result = mysqli_query($db_link, 'SELECT * FROM users WHERE name = "'.$_POST["username"].'"');

			if (mysqli_num_rows($result) == 0) :
				header("Location: ./index.php#login-are-incr-error-dialog");
			else :
				$db_user_row = mysqli_fetch_array($result);
				if (password_verify(htmlspecialchars($_POST["userpass"]), $db_user_row["password"])) :
					setcookie("username", $_POST["username"]);
					setcookie("userpass", password_hash(htmlspecialchars($_POST["userpass"]), PASSWORD_DEFAULT, array("cost" => 12)));
					mysqli_free_result($result);
					mysqli_close($db_link);
					header("Location: ./index.php");
				else :
					mysqli_free_result($result);
					mysqli_close($db_link);
					//print(var_dump($db_user_row).'<br /><br />'.var_dump($_POST["userpass"]).var_dump(htmlspecialchars($_POST["userpass"])).'<br />');
					header("Location: ./index.php#login-are-incr-error-dialog");
				endif;
			endif;
			
			mysqli_free_result($result);
			mysqli_close($db_link);
		}
	else :
		header("Location: ./index.php#db-error-dialog");
	endif;
endif;
session_stop();
?>