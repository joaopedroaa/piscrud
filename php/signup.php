<?php
session_start();
include_once "connect.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$login = mysqli_real_escape_string($conn, $_POST['login']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));

if (empty($name) || empty($login) || empty($password)) {
  header("Location:../signup.php");
  exit();
}

$sql = "INSERT INTO $table(name, login, password) VALUES('$name', '$login', '$password') ";

$query = mysqli_query($conn, $sql);

if ($query) {
  $_SESSION['signup'] = true;
  header("Location:../index.php");
  exit();
}
