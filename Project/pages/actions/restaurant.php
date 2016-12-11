<?php
include_once('../../database/dbUtils.php');

session_start();

$id = $_GET['id'];

$result = getRestaurant($id);
$_SESSION['restaurant'] = $result[0];

$restaurant_id = $_SESSION['restaurant']['id'];

$reviews = getRestaurantReviews($restaurant_id);

for($i = 0; $i < count($reviews);++$i){
    $nameOfTheUser = getUser($reviews[$i]['id_user']);
    $reviews[$i]['fullName'] = $nameOfTheUser[0]['name'];
    $replies = getReplies($reviews[$i]['id']);
    $reviews[$i]['replies'] = $replies;
}

$_SESSION['reviews'] = $reviews;

$owners = getOwners($id);
$newOwners = array();
foreach ($owners as $owner){
    array_push($newOwners,$owner['username']);
}

$_SESSION['owners'] = $newOwners;

header('Location: ../restaurant.php');
