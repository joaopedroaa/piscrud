<?php

$hostname = "localhost";
$username = "joaopedro";
$password = "password";
$database = "escola";

$tableLogin = "login";
$tableApp = "student";

$connect = mysqli_connect($hostname, $username, $password, $database) or die('Connect error');;
