<?php

include_once 'connect.php';

$id = $_GET['id'];

$query = "DELETE FROM $table WHERE id=$id";

$delete = mysqli_query($connect, $query);

if ($delete) {
  header('location:../index.php');
} else {
  echo "Delete error";
}

mysqli_close($connect);
