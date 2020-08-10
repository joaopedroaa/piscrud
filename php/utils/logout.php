<?php
// session_destroy();// Destroir todas as sessões
session_start();

unset($_SESSION['username']);
unset($_SESSION['name']);

header("Location: ../../index.php");
exit();
