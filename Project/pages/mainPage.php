<?php
session_start();
$_SESSION['incorrectLogin_flag']=0;
$_SESSION['invalid_user'] = 0;

//vivaaoporto 63aa3dbfd7bbd27922f8935e755dcf9f64d0980329bd3efd00875379ae5c3eab
//portoooo 36051484cfdca86a5d63ff7b888b223846f802482a43bc95f0148bf84c3c0a1b

/*echo password_hash("vivaaoporto", PASSWORD_DEFAULT);
echo '<br>';
echo password_hash("vivaaoporto", PASSWORD_DEFAULT);*/

include_once('templates/header.php');

include_once ('templates/mainPageContent.php');

include_once('templates/footer.php');