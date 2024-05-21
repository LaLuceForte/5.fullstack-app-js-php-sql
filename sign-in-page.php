<?php


require_once 'config/connect.php';

    //устанаваливаем кодировку
    $connect->set_charset("utf8");

    // подключаемся к БД
    $data = mysqli_query($connect, "SELECT * FROM clients");
    $data = mysqli_fetch_all($data);

    $mysqli = new mysqli('localhost', 'root', '', 'online-store');

    if (isset($_POST["sign"])) {
        if (isset($_POST["login"])) {
            $login = $_POST["login"];
        } else {
            $login = "";
        }
        
        if (isset($_POST["password"])) {
            $password = $_POST["password"];
            
        } else {
            $password = "";
        }
        
        
        foreach($data as $item)
        {
            if ($item[1] == $login && password_verify($password, $item[2])) {
               
                   include 'client.php';
                    $id=intval($item[3]);
                    session_start();
                    
                    $_SESSION["id"] = $id;
                
                // if ($item[0] == 'seller') {
                //     header ('Location: seller.php'); 
                //     require('seller.php');
                // }
                // if ($item[0] == 'admin') {
                //     header ('Location: admin.php'); 
                //     require('admin.php');
                // }
               
            }
            else {
                echo "неверный логин или пароль, попробуйте еще раз!";
            }
            
        };
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
    <title>Sign In page</title>
    <!-- подключаемся к стилям -->
    <link rel="stylesheet" href="reg-styles.css">
</head>

<form method="POST">
<button class="sign-in" name="homePage">
				<img src="pics/home.png"> HOME PAGE
			</button>
    <div class="login-password-field">

        <div class="input-wrapper">
            <input type="text" name="login" placeholder="login" class="input">


            <input type="text" name="password" placeholder="password" class="input">
        </div>


        <div class="button">
            <button name="sign" class="button-special">Войти</button>
        </div>
    </div>

</form>

</html>