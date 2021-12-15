<?php


include('model.php');
session_start();





if (empty($_POST['login'])) {
	$errors['login'] = 'Enter your Login!';
}
if (empty($_POST['password'])) {
	$errors['password'] = 'Enter your Password!';
}
if (empty($_POST['confirm'])) {
	$errors['conf'] = 'Enter your Password!';
}
if (empty($_POST['email'])) {
	$errors['email'] = 'Enter your Email!';
}

if ($_POST['password'] !== $_POST['confirm']) {
	$errors['match'] = 'Passwords not match!';
}

if (!empty($errors)) {
	$_SESSION['errors'] = $errors;
	header('location:registr_form.php');
	die();
}


$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];






$model->add_user($login,$password,$email);





header('location:index.php');
?>