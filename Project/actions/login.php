<?php
include_once('../database/dbUtils.php');

session_start();

$_SESSION['incorrectLogin_flag']=0;
$username = $_POST["username"];
$password = $_POST["password"];

$result = getUser($username);
$number_of_rows = sizeof($result);

if($number_of_rows != 0 && $result[0]["username"] == $username && $result[0]["password"] == $password){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['incorrectLogin_flag']=0;
    header('Location: ../index.php');
}
else {
    $_SESSION['incorrectLogin_flag']=1;
    header('Location: ../loginPage.php');
}



