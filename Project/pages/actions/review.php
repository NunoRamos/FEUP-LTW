<?php
session_start();

include_once('../../database/dbUtils.php');

include_once('../utils/utils.php');

$token = $_POST['token'];
if($_SESSION['token'] != $token){
    header('Location: ../templates/niceTry.html');
}

$id_restaurant = $_SESSION['restaurant']['id'];
$username = $_SESSION['username'];
$text = htmlspecialchars($_POST['text']);
$grade = $_POST['grade'];
$date = getFormatAtualTIme();

putReview($id_restaurant,$username,$text,$grade,$date);
$link = "restaurant.php?id=".$id_restaurant;
header('Location: '.$link);
