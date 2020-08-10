<?php
include_once 'connect.php';

$id = $_GET['id'];

$query = "DELETE FROM $tableApp WHERE registration=$id;";
echo $query;
$delete = mysqli_query($connect, $query);

if ($delete) {
  header('location:../pages/index.php');
} else {
  die("Delete error");
}

mysqli_close($connect);
