<?php
session_start();

include_once('../../database/dbUtils.php');

$token = $_POST['token'];
if($_SESSION['token'] != $token){
    header('Location: ../templates/niceTry.html');
}

if(isset($_POST['deleteRestaurant']) && $_POST['deleteRestaurant']==1) {
    $restaurantID = $_SESSION['restaurant']['id'];
    deleteRestaurant($restaurantID);
    header('Location: ../mainPage.php');
}
else{
    $newName = htmlspecialchars($_POST['newName']);
    $newType = htmlspecialchars($_POST['newType']);
    $newLocation = htmlspecialchars($_POST['newLocation']);
    $newPhone = htmlspecialchars($_POST['newPhone']);
    $newPrice = htmlspecialchars($_POST['newPrice']);
    $restaurantID = $_SESSION['restaurant']['id'];

    if ($newName != $_SESSION['restaurant']['name']) {
        updateRestaurantName($restaurantID, $newName);
    }

    if ($newType != $_SESSION['restaurant']['type']) {
        updateRestaurantType($restaurantID, $newType);
    }

    if ($newLocation != $_SESSION['restaurant']['location']) {
        updateRestaurantLocation($restaurantID, $newLocation);
    }

    if ($newLocation != $_SESSION['restaurant']['phone_number']) {
        updateRestaurantPhone($restaurantID, $newPhone);
    }

    if ($newLocation != $_SESSION['restaurant']['price']) {
        updateRestaurantPrice($restaurantID, $newPrice);
    }

    $link = "restaurant.php?id=" . $restaurantID;
    header('Location: ' . $link);
}