<?php

if (isset($_POST['registrate'])) {
    require_once 'config/connect.php';

    //устанаваливаем кодировку
    $connect->set_charset("utf8");

    // подключаемся к БД
    $data = mysqli_query($connect, "SELECT * FROM clients");
    
    $data = mysqli_fetch_all($data);

    $mysqli = new mysqli('localhost', 'root', '', 'online-store');

    if (isset($_POST["user-login"])) {
        $userLogin = $_POST["user-login"];
    } else {
        $userLogin = "";
    }

    $flag = false;
    if (isset($_POST["user-password"])) {
        $userPassword = $_POST["user-password"];
        $userPasswordHash = password_hash($userPassword, PASSWORD_BCRYPT);
       
    } else {
        $userPassword = "";
    }

    if (isset($_POST["user-role"])) {
        $userRole = $_POST["user-role"];

    } else {
        $userRole = "";
    }
    if (isset($_POST["user-name"])) {
        $userName = $_POST["user-name"];

    } else {
        $userName = "";
    }

    foreach($data as $item)
        {
            if (password_verify($userPassword, $item[2]) == true){
                $flag = true;
            }
            
        };

        if ($flag == false) {
            $sql = "INSERT INTO clients (`name`,`login`,`password`,`clientorder`,`role`) VALUES (\"$userName\",\"$userLogin\",\"$userPasswordHash\",'',\"$userRole\")";
            if (mysqli_query($connect, $sql)) {
                if ($userRole == 'client') {
                    
                    
                    header ('Location:client.php'); 
                    require('client.php');
                    $id=intval(mysqli_fetch_all(mysqli_query($connect, 'SELECT MAX(id) FROM clients'))[0][0]);
                    session_start();
                    
                    $_SESSION["id"] = $id;
                   
                }
                if ($userRole == 'seller') {
                    header ('Location: seller.php'); 
                    require('seller.php');
                }
                if ($userRole == 'admin') {
                    header ('Location: admin.php'); 
                    require('admin.php');
                }
            } else {
                echo "Error:  " . $sql . "<br>" . mysqli_error($connect);
            }
        }
        else {
            echo "такой пароль занят, придумайте другой";
        }
   

   

    mysqli_close($connect);


}


if (isset($_POST["homePage"])) {
    header ('Location: welcome-page.php'); 
            require('welcome-page.php');
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

<body>

    <form method="POST">
    <button class="sign-in" name="homePage">
				<img src="pics/home.png"> HOME PAGE
			</button>
        <div class="login-password-field">

            <div class="input-wrapper">
                <select name="user-role" id="" class="input">
                    <option value="client">Клиент</option>
                    <option value="seller">Продавец</option>
                    <option value="admin">Администратор</option>
                </select>
                <input type="text" name="user-name" placeholder="name" class="input">
                <input type="text" name="user-login" placeholder="login" class="input">
                <input type="text" name="user-password" placeholder="password" class="input">
            </div>


            <div class="button">
                <button class="button-special" name="registrate">Зарегистрироваться</button>
            </div>
        </div>

    </form>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>

</html>