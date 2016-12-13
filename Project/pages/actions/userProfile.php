<?php
session_start();

include_once('../../database/dbUtils.php');

if(!isset($_SESSION['username'])){
    header('Location: ../templates/niceTry.html');
}

$username = $_SESSION['username'];

$results = getUser($username);
$userInfo = $results[0];

$results = getUserRestaurants($username);


$_SESSION['userImg'] = getUserImage($_SESSION['username']);

$restaurantsInfo = array();

foreach ($results as $restaurantID){
    $restaurant = getRestaurant($restaurantID['id_restaurant']);
    array_push($restaurantsInfo,$restaurant);
}

$_SESSION['userInfo'] = $userInfo;
$_SESSION['userRestaurants'] = $restaurantsInfo;

header('Location: ../userProfile.php');


