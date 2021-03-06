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

    $userImage = getUserImage($reviews[$i]['id_user']);
    $reviews[$i]['userImage'] = $userImage[0]['path'];

    $replies = getReplies($reviews[$i]['id']);

    for($j = 0; $j < count($replies);++$j){
        $nameOfTheUserThatReply = getUser($replies[$j]['id_user']);
        $replies[$j]['fullName'] = $nameOfTheUserThatReply[0]['name'];
        $userImage = getUserImage($replies[$j]['id_user']);
        $replies[$j]['user_photo'] = $userImage[0]['path'];
    }

    $reviews[$i]['replies'] = $replies;
}

$_SESSION['reviews'] = $reviews;

$owners = getOwners($id);
$newOwners = array();
foreach ($owners as $owner){
    array_push($newOwners,$owner['username']);
}

$_SESSION['owners'] = $newOwners;

foreach ($reviews as $review){
    $total+=$review['grade'];
}
if(sizeof($reviews) ==0)
    $_SESSION['restaurant']['average']=0;
else
    $_SESSION['restaurant']['average'] = round($total/sizeof($reviews));


$results = getRestaurantImages($id);
$_SESSION['restaurant']['restaurantPhotoPath'] = '../images/restaurants/'.$results[0]['path'];

header('Location: ../restaurant.php');
