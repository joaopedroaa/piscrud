<?php

$hostname = "localhost";
$username = "joaopedro";
$password = "password";
$database = "signin";
$table = "person";

$conn = mysqli_connect($hostname, $username, $password, $database) or die('Connect error');;
