<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список таблиц текущей базы</title>
    <style>
        body {
            margin-left: 10%;
        }
        a {
            font-size: 25px;
        }
    </style>
</head>
<body>
<?php
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$pdo = new PDO("mysql:host=$servername;dbname=mysql;charset=utf8" , $username , $password);
$pdo->exec("SET NAMES utf8;");

//

$tableList = $pdo->query("SHOW TABLES")->fetchAll();
foreach ($tableList as $table) {
    echo '<a href="table.php?name=' . $table[0] . '">' . $table[0] . '</a><br>';
}
?>
</body>
</html>