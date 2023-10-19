<?php
require_once '../connect.php';

print_r($_GET);

$tablename= $_GET['tablename'];
$columnname= $_GET['columnname'];
$name = $_POST['title'];
print_r($tablename);
print_r($columnname);
print_r($name);


$desiredRole = "admin"; // Здесь укажите желаемое значение роли 

if ($_SESSION['role'] === $desiredRole) {
    // Если роль совпадает, выполните код добавления
   
    mysqli_query($connect, "INSERT INTO $tablename (id, $columnname) VALUES (NULL, '$name')");
    header('Location: ../' . $tablename . '.php');

    // Дальнейшая обработка или перенаправление на другую страницу
} else {
    
    header("Location: ../access_denied.php"); // Здесь укажите URL страницы с сообщением об ошибке
    exit(); // Важно вызвать exit() после использования header(), чтобы прекратить выполнение текущего скрипта
}


//mysqli_query($connect, "INSERT INTO $tablename (id, $columnname) VALUES (NULL, '$name')");
//header('Location: ../' . $tablename . '.php');