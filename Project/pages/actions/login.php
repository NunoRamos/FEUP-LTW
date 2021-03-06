<?php
include_once('../../database/dbUtils.php');

session_start();

$token = $_POST['token'];
if($_SESSION['token'] != $token){
    header('Location: ../templates/niceTry.html');
}

$_SESSION['incorrectLogin_flag']=0;
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$result = getUser($username);
$number_of_rows = sizeof($result);

$password = hash('sha256', $password);

if($number_of_rows != 0 && $result[0]["username"] == $username && $password == $result[0]["password"]){//password_verify($password, $result[0]["password"])){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['fullName'] = $result[0]['name'];
    $result=getUserImage($username);
    $_SESSION['userPhotoPath'] = $result[0]['path'];
    $_SESSION['incorrectLogin_flag']=0;
    if(isset($_SESSION['page']))
        header('Location: ../'.$_SESSION['page']);
    else header('Location: ../mainPage.php');
}
else {
    $_SESSION['incorrectLogin_flag']=1;
    header('Location: ../login.php');
}
