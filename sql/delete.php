<?php
require_once '../connect.php';

$id = $_GET['id'];


$desiredRole = "admin"; // Здесь укажите желаемое значение роли 

if ($_SESSION['role'] === $desiredRole) {
    // Если роль совпадает, выполните код добавления
   
    mysqli_query($connect, "DELETE FROM employees WHERE employees.id = '$id'");

    header('Location: /');

    // Дальнейшая обработка или перенаправление на другую страницу
} else {
    
    header("Location: ../access_denied.php"); // Здесь укажите URL страницы с сообщением об ошибке
    exit(); // Важно вызвать exit() после использования header(), чтобы прекратить выполнение текущего скрипта
}


//mysqli_query($connect, "DELETE FROM employees WHERE employees.id = '$id'");

//header('Location: /');


