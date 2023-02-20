<?php

session_start();

session_unset();
session_destroy();

header('Location: Ejer6.php');

?>

