<?php

session_start();

$_SESSION['nome'] = "Levi";

header('location:pag2.php');
exit;

?>