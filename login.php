<?php

include ('model.php');
// print_r($_POST);die();
session_start();

if (empty($_POST['login'])) {
	$_SESSION['error']  = 'Enter your Login!';
	header('location:login_form.php');
	die();
}
if (empty($_POST['password']) ){
	$_SESSION['error']  = 'Enter your Password!';
	header('location:login_form.php');
	die();
}

$login = $_POST['login'];
$password = $_POST['password'];
$user_id = $model->check_user($login,$password);
if(!$user_id){
	$_SESSION['error']  = 'wrong login or  Password!';
	header('location:login_form.php');
	die();
}

$_SESSION['user_id'] = $user_id;
$_SESSION['user'] = $login;

if (isset($_POST['remember'])) {
	setcookie('user',$login,time()+3600*24*365,'/');
	setcookie('user_id',$user_id,time()+3600*24*365,'/');

}


header('location:index.php');