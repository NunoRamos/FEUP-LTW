<?php
session_start();

$_SESSION['page'] = 'restaurant.php';

include_once('templates/header.php');

include_once('templates/addRestaurant.php');

include_once('templates/footer.php');