<?php
session_start();

include_once('../../database/dbUtils.php');

$id_restaurant = $_SESSION['restaurant']['id'];
$username = $_SESSION['username'];
$text = $_POST['text'];
$grade = $_POST['grade'];

putReview($id_restaurant,$username,$text,$grade);
$link = "restaurant.php?id=".$id_restaurant;
header('Location: '.$link);
