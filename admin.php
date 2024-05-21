<?php
require_once 'config\connect.php';


//устанаваливаем кодировку
$connect->set_charset("utf8");

$sql = "select * from components";

$components = mysqli_fetch_all(mysqli_query($connect, $sql));

$sql = "select * from clients";

$clients = mysqli_fetch_all(mysqli_query($connect, $sql));

$clients = mysqli_fetch_all(mysqli_query($connect, $sql));





if (isset($_POST["homePage"])) {
    header('Location: welcome-page.php');
    require('welcome-page.php');
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
        Администратор может просматривать пароли и логины пользователей, а также удалить компоненты


        <div class="admin-page">
            <div>
                <div class="body">
                    <div class="clients-info">
                        <div class="sidebar-header">ПОКУПАТЕЛИ</div>
                        <div id="users" class="components "></div>
                    </div>
                    <div class="sellers-info">
                        <div class="sidebar-header">ПРОДАВЦЫ</div>
                        <div id="sellers" class="components"></div>
                    </div>
                    <div class="components-info">
                        <div class="sidebar-header">КОМПОНЕНТЫ</div>
                        <div id="components" class="components"></div>
                    </div>
                </div>
            </div>


        </div>
        </div>

    </form>


    <script type="text/javascript">let components = <?php echo json_encode($components); ?>;</script>
    <script type="text/javascript">let clients = <?php echo json_encode($clients); ?>;</script>
    <script type="text/javascript" src="admin.js"></script>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>