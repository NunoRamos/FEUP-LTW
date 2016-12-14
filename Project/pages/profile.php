<?php

session_start();

$_SESSION['page'] = 'profile.php';

include_once('templates/header.php');

include_once ('templates/profile.php');

include_once('templates/footer.php');