<?php
session_start();

include_once('../../database/dbUtils.php');

include_once('../utils/utils.php');

$token = $_POST['token'];
if($_SESSION['token'] != $token){
    header('Location: ../templates/niceTry.html');
}

$replyText = htmlspecialchars($_POST['replyText']);
$reviewId = $_POST['reviewId'];
$restaurantId = $_POST['restaurantId'];
$username = $_SESSION['username'];
$date = getFormatAtualTIme();

addReply($reviewId,$username,$replyText,$date);

$link = "restaurant.php?id=".$restaurantId;
header('Location: '.$link);
