<?php
session_start();
$_SESSION['incorrectLogin_flag']=0;
$_SESSION['invalid_user'] = 0;

include_once('templates/header.php');

include_once ('mainPageContent.php');

include_once('templates/footer.php');

?>