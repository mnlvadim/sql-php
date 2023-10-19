<?php
  require_once './connect.php';
  $employees = $_GET['id'];
  //$employees = mysqli_query($connect,"SELECT * FROM employees where id=$employees;");
  $employees = mysqli_query($connect,"select employees.id,employees.full_name, employees.DOB, employees.salary,employees.contacts,departments.department_name,grades.grade_name,jobs.job_name, homeoffice.office_name,family.family_name
from employees 
join departments on employees.department_id=departments.id
join grades on employees.grade_id=grades.id
join jobs on employees.job_title_id=jobs.id
join homeoffice on employees.homeoffice_id=homeoffice.id
join family on employees.family_id=family.id
where employees.id=$employees;");
  $employees = mysqli_fetch_assoc($employees);
  //print_r($product);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновление информации о сотруднике</title>
</head>
<body>

<ul>
    <li><a href="/index.php">Кадры</a></li>
    <li><a href="/departments.php">Отделы</a></li>
    <li><a href="/grades.php">Грейды</a></li>
    <li><a href="/jobs.php">Должности</a></li>
    <li><a href="/homeoffice.php">Офисы</a></li>
    <li><a href="/family.php">СП</a></li>
</ul>
  <hr>

  <h2>Обновить информацию о сотруднике</h2>
  <form action="./sql/update.php" method="post">
  <div class="form">
    <input type="hidden" name="id" value="<?= $employees['id'] ?>">
    <p>ФИО</p>
    <input type="text" name="full_name" value="<?= $employees['full_name'] ?>">
    <p>Дата рождения</p>
    <input type="text" name="DOB" value="<?= $employees['DOB'] ?>">
    <p>Зарплата</p>
    <input type="text" name="salary" value="<?= $employees['salary'] ?>">
    <p>Контакты</p>
    <input type="text" name="contacts" value="<?= $employees['contacts'] ?>">
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
    <button type="submit" style="width:100%;">Обновить</button>
  </form>

</body>
</html>