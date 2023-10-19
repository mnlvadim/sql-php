<?php
$connect = mysqli_connect('127.0.0.1','root','','secondtest');
session_start();
if(!$connect){
    die('Connection error');
}

?>