<?php
require_once './connect.php';

$employees = mysqli_query($connect,"select employees.id,employees.full_name, employees.DOB, employees.salary,employees.contacts,departments.department_name,grades.grade_name,jobs.job_name, homeoffice.office_name,family.family_name
from employees 
join departments on employees.department_id=departments.id
join grades on employees.grade_id=grades.id
join jobs on employees.job_title_id=jobs.id
join homeoffice on employees.homeoffice_id=homeoffice.id
join family on employees.family_id=family.id;
");
//$employees = mysqli_query($connect,"SELECT * FROM employees;");
$employees = mysqli_fetch_all($employees);
print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

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
<button onclick="openModal()" style="width:100%;">Добавить сотрудника</button>

<table>
    <tr>
        <th>id</th>
        <th>ФИО</th>
        <th>Дата рождения</th>
        <th>Зарплата</th>
        <th>Контакты</th>
        <th>Отдел</th>
        <th>Грейд</th>
        <th>Должность</th>
        <th>Офис</th>
        <th>СП</th>
        <!--<th>&#9672;</th>-->
        <th>&#9998;</th>
        <th>&#10006;</th>
    </tr>
    <?php 
    foreach ($employees as $item){
        ?>
            <tr>
                <td><?php echo $item[0] ?></td>
                <td><?php echo $item[1] ?></td>
                <td><?php echo $item[2] ?></td>
                <td><?php echo $item[3] ?></td>
                <td><?php echo $item[4] ?></td>
                <td><?php echo $item[5] ?></td>
                <td><?php echo $item[6] ?></td>
                <td><?php echo $item[7] ?></td>
                <td><?php echo $item[8] ?></td>
                <td><?php echo $item[9] ?></td>
                <!--<td><a href="product.php?id=<?= $item[0]?>">Просмотр</a></td>-->
                <td><a href="update.php?id=<?= $item[0]?>">Обновить</a></td>
                <td><a href="sql/delete.php?id=<?= $item[0]?>">Удалить</a></td>
            </tr>
            <?php
    }
    ?>
</table>


<!--
    
<h2>Добавить сотрудника</h2>
<form action="sql/create.php" method="post">
    <p>ФИО</p>
    <input type="text" name="full_name">
    <p>Дата рождения</p>
    <input type="text" name="DOB">
    <p>Зарплата</p>
    <input type="text" name="salary">
    <p>Контакты</p>
    <input type="text" name="contacts">
    
    <p>Отдел</p>
    <select name="department">
    <?php
    require_once './connect.php';
    // Выборка данных из таблицы
    $query = "SELECT * FROM departments";
    $result = mysqli_query($connect, $query);
    // Перебор результатов выборки и создание <option> для каждой записи
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['department_name'];
        echo '<option value="'. $id .'">'. $name .'</option>';
    }
    ?>
    </select>


    <p>Грейд</p>
    <select name="grade">
    <?php
    require_once './connect.php';
    // Выборка данных из таблицы
    $query = "SELECT * FROM grades";
    $result = mysqli_query($connect, $query);
    // Перебор результатов выборки и создание <option> для каждой записи
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['grade_name'];
        echo '<option value="'. $id .'">'. $name .'</option>';
    }
    ?>
    </select>


    <p>Должность</p>
    <select name="job">
    <?php
    require_once './connect.php';
    // Выборка данных из таблицы
    $query = "SELECT * FROM jobs";
    $result = mysqli_query($connect, $query);
    // Перебор результатов выборки и создание <option> для каждой записи
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['job_name'];
        echo '<option value="'. $id .'">'. $name .'</option>';
    }
    ?>
    </select>
    
    <p>Офис</p>
    <select name="office">
    <?php
    require_once './connect.php';
    // Выборка данных из таблицы
    $query = "SELECT * FROM homeoffice";
    $result = mysqli_query($connect, $query);
    // Перебор результатов выборки и создание <option> для каждой записи
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['office_name'];
        echo '<option value="'. $id .'">'. $name .'</option>';
    }
    ?>
    </select>

    <p>СП</p>
    <select name="family">
    <?php
    require_once './connect.php';
    // Выборка данных из таблицы
    $query = "SELECT * FROM family";
    $result = mysqli_query($connect, $query);
    // Перебор результатов выборки и создание <option> для каждой записи
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['family_name'];
        echo '<option value="'. $id .'">'. $name .'</option>';
    }
    ?>
    </select>

    <button type="submit">Добавить</button>
</form>

-->

<div id="myModal" class="modal">
        <div class="modal-content">
        <h2>Добавить сотрудника</h2>
        <form action="sql/create.php" method="post">
            <div class="form">
            <p>ФИО</p>
            <input type="text" name="full_name">
            <p>Дата рождения</p>
            <input type="text" name="DOB">
            <p>Зарплата</p>
            <input type="text" name="salary">
            <p>Контакты</p>
            <input type="text" name="contacts">
            
            <p>Отдел</p>
            <select name="department">
            <?php
            require_once './connect.php';
            // Выборка данных из таблицы
            $query = "SELECT * FROM departments";
            $result = mysqli_query($connect, $query);
            // Перебор результатов выборки и создание <option> для каждой записи
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['department_name'];
                echo '<option value="'. $id .'">'. $name .'</option>';
            }
            ?>
            </select>


            <p>Грейд</p>
            <select name="grade">
            <?php
            require_once './connect.php';
            // Выборка данных из таблицы
            $query = "SELECT * FROM grades";
            $result = mysqli_query($connect, $query);
            // Перебор результатов выборки и создание <option> для каждой записи
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['grade_name'];
                echo '<option value="'. $id .'">'. $name .'</option>';
            }
            ?>
            </select>


            <p>Должность</p>
            <select name="job">
            <?php
            require_once './connect.php';
            // Выборка данных из таблицы
            $query = "SELECT * FROM jobs";
            $result = mysqli_query($connect, $query);
            // Перебор результатов выборки и создание <option> для каждой записи
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['job_name'];
                echo '<option value="'. $id .'">'. $name .'</option>';
            }
            ?>
            </select>
            
            <p>Офис</p>
            <select name="office">
            <?php
            require_once './connect.php';
            // Выборка данных из таблицы
            $query = "SELECT * FROM homeoffice";
            $result = mysqli_query($connect, $query);
            // Перебор результатов выборки и создание <option> для каждой записи
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['office_name'];
                echo '<option value="'. $id .'">'. $name .'</option>';
            }
            ?>
            </select>

            <p>СП</p>
            <select name="family">
            <?php
            require_once './connect.php';
            // Выборка данных из таблицы
            $query = "SELECT * FROM family";
            $result = mysqli_query($connect, $query);
            // Перебор результатов выборки и создание <option> для каждой записи
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['family_name'];
                echo '<option value="'. $id .'">'. $name .'</option>';
            }
            ?>
            </select>
            
            </div>
            <button type="submit" style="width: 100%;">Добавить</button>   
        </form>
            
        <button onclick="closeModal()" style="width:100%;">Закрыть</button>
        </div>
    
    </div>

    <script>
        var modal = document.getElementById("myModal");

        function openModal() {
            modal.style.display = "block";
        }

        function closeModal() {
            modal.style.display = "none";
        }
    </script>

</body>
</htmld
 


