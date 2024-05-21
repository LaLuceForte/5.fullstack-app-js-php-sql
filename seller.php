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

if (isset($_POST["new-component"])) {
    $newComponent=$_POST["new-component"];
    
} else{
    $newComponent="empty";
}

if (isset($_POST['add']) && strlen($profile_viewer_uid) > 0) {
  
    $sql = "INSERT INTO components VALUES (\"$profile_viewer_uid\")";
    if (mysqli_query($connect, $sql)) {

    } else {
        echo "Error:  " . $sql . "<br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
}

if (isset($_POST["homePage"])) {
    header('Location: welcome-page.php');
    require('welcome-page.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Seller page</title>
    <!-- подключаемся к стилям -->
    <link rel="stylesheet" href="page.css">
    
</head>

<body>

    <div class="wrapper">
        <form method="POST">
            <button class="sign-in" name="homePage">
                <img src="pics/home.png"> HOME PAGE
            </button>
       
        <div class="header">
            <span>Страничка продавцов</span>
        </div>
        <span> внедрение новых компонентов для создания незабываемых ароматов</span>

        <div class="body">
            <div class="sidebar">
                <div class="sidebar-header">КОМПОНЕНТЫ</div>
                <div id="components" class="components"></div>
            </div>
            <div class="content">
                <div class="content-header">Введите название компонента (на латинице), который вы хотите добавить </div>
                <div>
                   
                        <input type="text" name="new-component" placeholder="Название.." id="newComponent" >
                    
                </div>
                <div class="custom-components"></div>
                <div class="order">
                   
                        <button class="order-button" onclick="getInputValue()" name="add">ДОБАВИТЬ</button>
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

    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    <script type="text/javascript">let jArray = <?php echo json_encode($components); ?>;</script>
    <script type="text/javascript" src="seller.js"></script>
    
</body>

</html>