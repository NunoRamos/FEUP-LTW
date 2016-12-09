<?php
include_once('../../database/dbUtils.php');

session_start();

$id = $_GET['id'];

$result = getRestaurant($id);
$_SESSION['restaurant'] = $result[0];

$restaurant_id = $_SESSION['restaurant']['id'];

$reviews = getRestaurantReviews($restaurant_id);

$_SESSION['reviews'] = $reviews;

$owners = getOwners($id);
$newOwners = array();
foreach ($owners as $owner){
    array_push($newOwners,$owner['username']);
}

$_SESSION['owners'] = $newOwners;

header('Location: ../restaurant.php');
