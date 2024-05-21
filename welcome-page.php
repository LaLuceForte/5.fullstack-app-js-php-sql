<?php
require_once 'config/connect.php';




if (isset($_POST["signIn"])) {
	echo "ok";
	header('Location: login.php');
	require('login.php');

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome page</title>
	<!-- подключаемся к стилям -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<form method="POST">
		<div class="main">
			<button class="sign-in" name="signIn">
				<img src="pics/sign-in.png">
			</button>
			<div class="welcome-page">
				<div class="title">
					Il grande profumiere
				</div>
				<div class="description">
					Интернет магазин парфюмерии
				</div>
			</div>

		</div>
	</form>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>

</html>