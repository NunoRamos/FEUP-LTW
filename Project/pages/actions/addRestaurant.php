<?php
session_start();

include_once('../../database/dbUtils.php');

$name = $_GET['name'];
$location = $_GET['location'];
$type = $_GET['type'];

$doesTheRestaurantExist = getRestaurantByName($name);

if(sizeof($doesTheRestaurantExist) != 0){
    $_SESSION['invalid_restaurant'] = 1;
    header('Location: ../addRestaurant.php');
}
else {
    putRestaurant($name,$location,$type);
    $_SESSION['invalid_restaurant'] = 0;
    $restaurantId = getRestaurantByName($name);
    $link = "restaurant.php?id=".$restaurantId[0]['id'];
    header('Location: '.$link);
}

