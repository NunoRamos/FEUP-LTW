<?php
session_start();

include_once('../../database/dbUtils.php');

$token = $_POST['token'];
if($_SESSION['token'] != $token){
    header('Location: ../niceTry.php');
}

$replyText = htmlspecialchars($_POST['replyText']);
$reviewId = $_POST['reviewId'];
$restaurantId = $_POST['restaurantId'];
$username = $_SESSION['username'];

addReply($reviewId,$username,$replyText);

$link = "restaurant.php?id=".$restaurantId;
header('Location: '.$link);
