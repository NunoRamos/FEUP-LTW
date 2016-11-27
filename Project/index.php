<?php
session_start();
$_SESSION['incorrectLogin_flag']=0;
include_once('header.php');

include_once ('mainPageContent.php');

include_once('footer.php');
?>