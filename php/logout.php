<?php
// session_destroy();// Destroir todas as sessões
session_start();
unset($_SESSION['username']);
header("Location: ../index.php");
exit();
