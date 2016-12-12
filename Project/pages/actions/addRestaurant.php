<?php
session_start();

include_once('../../database/dbUtils.php');

if(!isset($_SESSION['username'])){
    header('Location: ../mainPage.php');
}

$name = $_GET['name'];
$location = $_GET['location'];
$type = $_GET['type'];
$username = $_SESSION['username'];

$doesTheRestaurantExist = getRestaurantByName($name);

if(sizeof($doesTheRestaurantExist) != 0){
    $_SESSION['invalid_restaurant'] = 1;
    header('Location: ../addRestaurant.php');
}
else {
    putRestaurant($name,$location,$type);
    $restaurantId = getRestaurantByName($name);
    addOwner($restaurantId[0]['id'],$username);
    $_SESSION['invalid_restaurant'] = 0;
    $link = "restaurant.php?id=".$restaurantId[0]['id'];
    header('Location: '.$link);
}

