<?php
include_once('../../database/dbUtils.php');

session_start();

$id = $_GET['id'];

$result = getRestaurant($id);
$_SESSION['restaurant'] = $result[0];

$restaurant_id = $_SESSION['restaurant']['id'];

$reviews = getRestaurantReviews($restaurant_id);

$_SESSION['reviews'] = $reviews;

header('Location: ../restaurant.php');
