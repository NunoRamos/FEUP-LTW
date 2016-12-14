<?php
session_start();

include_once('../../database/dbUtils.php');


$username=$_GET['username'];

$result = getUser($username);
$userInfo = $result[0];

$img_result=getUserImage($username);
$number_of_reviews=getNumberOfRevies($username);

$user_img=$img_result[0]['path'];

$rest_results=getUserRestaurants($username);
$restaurantsInfo = array();
foreach ($rest_results as $restaurantID){
    $restaurant = getRestaurant($restaurantID['id_restaurant']);
    array_push($restaurantsInfo,$restaurant);
}

$_SESSION['profile_userInfo']=$userInfo;
$_SESSION['profile_img']=$user_img;
$_SESSION['number_of_reviews']=$number_of_reviews;
$_SESSION['profile_restaurantsInfo']=$restaurantsInfo;

header("Location: ../profile.php");