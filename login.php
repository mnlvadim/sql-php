<?php
require_once './connect.php';



session_start();

// Получаем данные из формы
$username = $_POST['username'];
$password = $_POST['password'];

// Проверяем данные пользователя в БД
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    // Если данные верны, то авторизуем пользователя
    $_SESSION['username'] = $username;

    // Устанавливаем значение 'admin' для ключа 'role'
    $_SESSION['role'] = $username;

    header("Location: index.php");
} else {
    // Если данные неверны, выводим сообщение об ошибке
    echo "Неверное имя пользователя или пароль.";
}

?>
