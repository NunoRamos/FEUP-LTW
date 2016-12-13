<?php
session_start();

include_once('../../database/dbUtils.php');

if(!isset($_SESSION['username'])){
    header('Location: ../mainPage.php');
}

$token = $_GET['token'];
if($_SESSION['token'] != $token){
    header('Location: ../templates/niceTry.html');
}

$name = htmlspecialchars($_GET['name']);
$location = htmlspecialchars($_GET['location']);
$type = htmlspecialchars($_GET['type']);
$phone = htmlspecialchars($_GET['phone']);
$price = htmlspecialchars($_GET['price']);
$username = $_SESSION['username'];

$doesTheRestaurantExist = getRestaurantByName($name);

if(sizeof($doesTheRestaurantExist) != 0){
    $_SESSION['invalid_restaurant'] = 1;
    header('Location: ../addRestaurant.php');
}
else {
    putRestaurant($name,$location,$type,$phone,$price);
    $restaurantId = getRestaurantByName($name);
    createRestaurantImage($restaurantId[0]['id'],"default-restaurant-icon.jpg");
    addOwner($restaurantId[0]['id'],$username);
    $_SESSION['invalid_restaurant'] = 0;
    $link = "restaurant.php?id=".$restaurantId[0]['id'];
    header('Location: '.$link);
}

