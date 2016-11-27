<?php
session_start();
$db = new PDO('sqlite:database/database.db');
$_SESSION['incorrectLogin_flag']=0;
include_once('header.php');

include_once ('mainPageContent.php');

include_once('footer.php');
?>