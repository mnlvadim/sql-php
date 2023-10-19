<?php
require_once './connect.php';
$query = mysqli_query($connect,"select * from departments");
//$employees = mysqli_query($connect,"SELECT * FROM employees;");
$query = mysqli_fetch_all($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<header>
<ul>
    <li><a href="/index.php">Кадры</a></li>
    <li><a href="/departments.php">Отделы</a></li>
    <li><a href="/grades.php">Грейды</a></li>
    <li><a href="/jobs.php">Должности</a></li>
    <li><a href="/homeoffice.php">Офисы</a></li>
    <li><a href="/family.php">СП</a></li>
</ul>
</header>

<body>
<table>
    <tr>
        <th>id</th>
        <th>Название отдела</th>
        <th>&#9998;</th>
        <th>&#10006;</th>
    </tr>
    <?php 
    foreach ($query as $item){
        ?>
            <tr>
                <td><?php echo $item[0] ?></td>
                <td><?php echo $item[1] ?></td>
                <td><a href="update.php?id=<?= $item[0]?>">Обновить</a></td>
                <td><a href="sql/delete.php?id=<?= $item[0]?>">Удалить</a></td>
            </tr>
            <?php
    }
    ?>
</table>

<title2 class="title2">Добавить новый отдел</title2>

  <form action="sql/createsecond.php?tablename=departments&columnname=department_name" method="post">
    <p>Название</p>
    <input type="text" name="title">
    <button type="submit">Добавить</button>
  </form>

</body>