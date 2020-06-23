<?php
include_once "connect.php";
session_start();

function backIndex()
{
  header("Location:../index.php");
  exit();
}

$username = mysqli_real_escape_string($conn,  $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (empty($username) || empty($password)) {
  backIndex();
}



$sql = "SELECT id, name, login FROM $table WHERE login='$username' AND password=md5('$password');";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);

$sql_login = "SELECT id, name, login FROM $table WHERE login='$username'";
$query_login = mysqli_query($conn, $sql_login);
$row_login = mysqli_num_rows($query_login);

if ($row) {
  $_SESSION['username'] = $username;
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
