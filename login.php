<?php

if (isset($_POST["signInAccount"])) {
	header('Location: sign-in-page.php');
	require('sign-ip-page.php');
}

if (isset($_POST["registartion"])) {
	header('Location: registration-page.php');
	require('registration-page.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Registartion page</title>
	<!-- подключаемся к стилям -->
	<link rel="stylesheet" href="reg-styles.css">
</head>

<form method="POST">
	<div class="login-password-field">
		<div class="button">
			<button name="signInAccount" class="button-special">Войти</button>
		</div>
		<div class="button">
			<button name="registartion" class="button-special">Зарегистрироваться</button>
		</div>
	</div>

</form>

</html>