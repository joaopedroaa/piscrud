<?php
include_once 'connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM $tableApp WHERE registration=$id;";
$query = mysqli_query($connect, $sql);

if (!$query) {
  die("Delete error");
} else {
  header('location:../pages/index.php');
}

mysqli_close($connect);
