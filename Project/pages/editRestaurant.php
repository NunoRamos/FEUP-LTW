<?php
session_start();

$_SESSION['page'] = 'editRestaurant.php';

include_once('templates/header.php');

include_once('templates/editRestaurant.php');

include_once('templates/footer.php');
?>
