<?php
include_once('../../database/dbUtils.php');

session_start();

$_SESSION['invalid_user'] = 0;

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$gender = htmlspecialchars($_POST["gender"]);

if($username != null && $password != null){

    $result = getUser($username);
    $number_of_rows = sizeof($result);

    if($number_of_rows == 0){
        $password = password_hash($password,PASSWORD_DEFAULT);
        putUser($username,$password,$name,$email,$gender);
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION['fullName'] =$name;
        header('Location: ../mainPage.php');
        $_SESSION['invalid_user'] = 0;
    }
    else {
        $username = null;
        $password = null;
        $_SESSION['invalid_user'] = 1;
        header('Location: ../signup.php');
    }
}