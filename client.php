<?php

require_once 'config\connect.php';


//устанаваливаем кодировку
$connect->set_charset("utf8");

// подключаемся к БД
$data = mysqli_query($connect, "SELECT * FROM components");
$data = mysqli_fetch_all($data);

$mysqli = new mysqli('localhost', 'root', '', 'online-store');

$components = $data;
$profile_viewer_uid = $_COOKIE['profile_viewer_uid'];

session_start();
if (isset($_SESSION["id"]))
{
    $id = $_SESSION["id"];
    echo "id: $id";
}

if (isset($_POST["homePage"])) {
    header('Location: welcome-page.php');
    require('welcome-page.php');
}

if (isset($_POST["exit"])) {
   
    header('Location: login.php');
    require('login.php');
    
}

if (isset($_POST['orderButton']) && strlen($profile_viewer_uid) > 0) {
    $sql = "UPDATE clients set `clientorder` = \"$profile_viewer_uid\"  WHERE id=\"$id\"";    
    if (mysqli_query($connect, $sql) ) {
      
     } else {
         echo "Error:  " . $sql . "<br>" . mysqli_error($connect);
     }
     
     mysqli_close($connect);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Client page</title>
    <!-- подключаемся к стилям -->
    <link rel="stylesheet" href="page.css">

</head>

<body>
    <form method="POST">
        <button class="sign-in" name="homePage">
            <img src="pics/home.png"> HOME PAGE
        </button>
        <button class="exit" name="exit">
            <img src="pics/exit.png"> ВЫЙТИ
        </button>
    </form>

    <div class="wrapper">
        <div class="header">
            <span>Интернет магазин парфюмерии</span>
        </div>

        <div class="body">
            <div class="sidebar">
                <div class="sidebar-header">КОМПОНЕНТЫ</div>
                <div id="components" class="components"></div>
            </div>
            <div class="content">
                <div class="content-header">Нажмите на любимые компоненты слева, чтобы мы смогли составить идеальные
                    духи для вас</div>
                <div class="inner">Состав:</div>
                <div class="custom-components" name="custom-components"></div>
                <div class="order">
                    <form method="POST">
                        <button class="order-button" name="orderButton">ЗАКАЗАТЬ</button>
                    </form>
                </div>


            </div>
        </div>

        <div class="footer">
            Выполнила Гомолицкая Светлана <br>
            Группа А-17-20
            Курсовая работа
        </div>
    </div>



    </form>

    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    <script type="text/javascript">let jArray = <?php echo json_encode($components); ?>;</script>
    <script type="text/javascript" src="client.js"></script>


</body>

</html>