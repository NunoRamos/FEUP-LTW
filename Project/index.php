<?php
session_start();
$db = new PDO('sqlite:database/database.db');
$_SESSION['incorrectLogin_flag']=0;
include_once('templates/header.php');

include_once ('mainPageContent.php');

include_once('templates/footer.php');
?>