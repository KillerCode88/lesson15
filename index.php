<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Таблицы</title>
    <style>
        body {
            margin-left: 10%;
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

//Создать новую таблицу через php;

$table = 'newUsersTable';
$columnsArr = ['id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY' ,
    'first_name VARCHAR(150) NOT NULL' ,
    'last_name VARCHAR(150) NOT NULL' ,
    'city VARCHAR(150) NOT NULL' ,
    'country VARCHAR(250) NOT NULL' ,
    'email VARCHAR(50) NOT NULL UNIQUE' ,
    'phone_number INT(11) NOT NULL'];
$columns = implode(', ' , $columnsArr);
try {
    $sql = "CREATE TABLE IF NOT EXISTS $table ( " . $columns . ' )';
    $pdo->exec($sql);
    echo "Таблица <b>$table</b> создана успешно.<br>";
} catch (Exception $e) {
    echo 'Что-то тут не так: ' , $e->getMessage();
}
// список таблиц текущей базы.
?>
<a href="list.php">Список таблиц</a>
</body>
</html>