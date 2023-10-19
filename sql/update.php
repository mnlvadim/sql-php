<?php
require_once '../connect.php';
print_r($_POST);

$id = $_POST['id'];
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
   
        mysqli_query($connect, "
    UPDATE employees
    SET full_name = '$full_name', DOB = '$DOB', salary = '$salary', contacts = '$contacts',
    department_id = '$department', grade_id = '$grade', job_title_id = '$job', homeoffice_id = '$office', family_id = '$family'
    WHERE id = $id;
    ");

    header('Location: /');

    // Дальнейшая обработка или перенаправление на другую страницу
} else {
    
    header("Location: ../access_denied.php"); // Здесь укажите URL страницы с сообщением об ошибке
    exit(); // Важно вызвать exit() после использования header(), чтобы прекратить выполнение текущего скрипта
}




//mysqli_query($connect, "
//UPDATE employees
//SET full_name = '$full_name', DOB = '$DOB', salary = '$salary', contacts = '$contacts',
//department_id = '$department', grade_id = '$grade', job_title_id = '$job', homeoffice_id = '$office', family_id = '$family'
//WHERE id = $id;
//");

//header('Location: /');



