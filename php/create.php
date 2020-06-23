<?php

include_once "connect.php";

$model =  filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);
$carYear = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);

$query = "INSERT INTO $table(model, brand, price, carYear, color) VALUES('$model', '$brand', '$price', $carYear, '$color')";

$create = mysqli_query($connect, $query);

if ($create) {
  header("Location:../index.php");
} else {
  echo "Create error <br><br>" . mysqli_error($connect);
}

mysqli_close($connect);
