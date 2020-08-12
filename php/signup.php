<?php
session_start();
include_once "connect.php";

$name = mysqli_real_escape_string($connect, $_POST['name']);
$login = mysqli_real_escape_string($connect, $_POST['login']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$password_hash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 10));

if(password_needs_rehash($hash, PASSWORD_DEFAULT, array("cost" => 10))){

}

if (empty($name) || empty($login) || empty($password)) {
  header("Location:../signup.php");
  exit();
}

$sql = "INSERT INTO $tableLogin(name, login, password) VALUES('$name', '$login', '$password_hash') ";

$query = mysqli_query($connect, $sql);

if ($query) {
  $_SESSION['signup'] = true;
  header("Location:../index.php");
  exit();

} else {
  die("Erro no signup");
}


