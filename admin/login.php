<?php


include('model.php');

session_start();
$login = $_POST['login'];
$pass = $_POST['password'];
$model = new Model;
if($model->check_admin($login,$pass)){
    $_SESSION['admin']  = $login;
    header('location:home.php');
    die;
}else{
    $_SESSION['error'] = 'wrong login or password';
    header('location:index.php');
    die;
}

