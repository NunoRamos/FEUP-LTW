<?php
session_start();
$_SESSION['incorrectLogin_flag']=0;
$_SESSION['invalid_user'] = 0;
$_SESSION["profile_updated"] = 0;
$_SESSION['page'] = 'mainPage.php';

include_once('templates/header.php');

include_once ('templates/mainPageContent.php');

include_once('templates/footer.php');