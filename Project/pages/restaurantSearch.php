<?php
session_start();
$_SESSION['page'] = 'restaurantSearch.php';

include_once('templates/header.php');

include_once('templates/restaurantSearch.php');

include_once('templates/footer.php');

