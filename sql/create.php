<?php
require_once '../connect.php';

print_r($_POST);

$full_name = $_POST['full_name'];
$DOB = $_POST['DOB'];
$salary = $_POST['salary'];
$contacts = $_POST['contacts'];
$department=$_POST['department'];
$grade=$_POST['grade'];
$job=$_POST['job'];
$office=$_POST['office'];
$family=$_POST['family'];





$desiredRole = "admin"; // Здесь укажите желаемое значение роли 

if ($_SESSION['role'] === $desiredRole) {
    // Если роль совпадает, выполните код добавления
   
    mysqli_query($connect, "INSERT INTO `employees` (`id`, `full_name`, `DOB`, `salary`, `contacts`, `department_id`, `grade_id`, `job_title_id`, `homeoffice_id`, `family_id`) VALUES (NULL, '$full_name', '$DOB', '$salary', '$contacts', '$department','$grade','$job','$office','$family')");

    header('Location: /');

    // Дальнейшая обработка или перенаправление на другую страницу
} else {
    
    header("Location: ../access_denied.php"); // Здесь укажите URL страницы с сообщением об ошибке
    exit(); // Важно вызвать exit() после использования header(), чтобы прекратить выполнение текущего скрипта
}







