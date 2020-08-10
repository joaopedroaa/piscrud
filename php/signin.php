<?php
include_once "connect.php";
session_start();

function backIndex(){
  header("Location:../index.php");
  exit();
}

$username = mysqli_real_escape_string($connect,  $_POST['username']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
if (empty($username) || empty($password)) {
  backIndex();
}


$sql = "SELECT id, name, login FROM $tableLogin WHERE login='$username' AND password=md5('$password');";
$query = mysqli_query($connect, $sql);
$row = mysqli_num_rows($query);

$sql_login = "SELECT id, name, login FROM $tableLogin WHERE login='$username'";
$query_login = mysqli_query($connect, $sql_login);
$row_login = mysqli_num_rows($query_login);


if ($row) {
  $_SESSION['username'] = $username;
  $_SESSION['name'] = mysqli_fetch_assoc($query_login)['name'];
  header("Location:../pages/index.php");

  exit();

} else {
  if ($row_login) {
    $_SESSION['unauthorized_password'] = true;
    backIndex();
  } else {
    $_SESSION['unauthorized_login'] = true;
    backIndex();
  }
}
