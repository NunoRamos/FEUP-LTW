<?php
session_start();

include_once('../../database/dbUtils.php');

$token = $_POST['token'];
if($_SESSION['token'] != $token){
    header('Location: ../niceTry.php');
}

$newEmail = $_POST['newEmail'];
$newFullName = $_POST['newFullName'];
$newGender = $_POST['newGender'];
$username = $_SESSION['username'];
$_SESSION["profile_updated"] = 0;

if($newEmail != $_SESSION['userInfo']['email']){
    updateUserEmail($username,$newEmail);
    $_SESSION["profile_updated"] = 1;
}

if($newFullName != $_SESSION['userInfo']['name']){
    updateUserFullName($username,$newFullName);
    $_SESSION["profile_updated"] = 1;
}

if($newGender != $_SESSION['userInfo']['gender']){
    updateUserGender($username,$newGender);
    $_SESSION["profile_updated"] = 1;
}

header('Location: userProfile.php');