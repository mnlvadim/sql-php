<?php
session_start();
// ...
$desiredRole = "admin"; // Здесь укажите желаемое значение роли (например, "admin")

if ($_SESSION['role'] === $desiredRole) {
    // Если роль совпадает, выполните код добавления
    mysqli_query($connect, "INSERT INTO `employees` (`id`, `full_name`, `DOB`, `salary`, `contacts`, `department_id`, `grade_id`, `job_title_id`, `homeoffice_id`, `family_id`)
        VALUES (NULL, '$full_name', '$DOB', '$salary', '$contacts', '$department','$grade','$job','$office','$family')");

    // Дальнейшая обработка или перенаправление на другую страницу
} else {
    // Если роль не совпадает, перенаправление на страницу с сообщением об ошибке
    header("Location: access_denied.php"); // Здесь укажите URL страницы с сообщением об ошибке
    exit(); // Важно вызвать exit() после использования header(), чтобы прекратить выполнение текущего скрипта
}
?>



if ($_SESSION['role'] === $desiredRole) {
    // Если роль совпадает, выполните код добавления
   


    // Дальнейшая обработка или перенаправление на другую страницу
} else {
    
    header("Location: access_denied.php"); // Здесь укажите URL страницы с сообщением об ошибке
    exit(); // Важно вызвать exit() после использования header(), чтобы прекратить выполнение текущего скрипта
}