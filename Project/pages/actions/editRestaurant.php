<?php
session_start();

include_once('../../database/dbUtils.php');

$newName = $_POST['newName'];
$newType = $_POST['newType'];
$newLocation = $_POST['newLocation'];
$restaurantID = $_SESSION['restaurant']['id'];

if($newName != $_SESSION['restaurant']['name']){
    updateRestaurantName($restaurantID,$newName);
}

if($newType != $_SESSION['restaurant']['type']){
    updateRestaurantType($restaurantID, $newType);
}

if($newLocation != $_SESSION['restaurant']['location']){
    updateRestaurantLocation($restaurantID, $newLocation);
}

$link = "restaurant.php?id=".$restaurantID;
header('Location: '.$link);