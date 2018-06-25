<?php 
require('config.php');

// session_start();
unset($_SESSION['user']);
session_destroy();

header('Location: ' . HOST . 'index.php');




 ?>