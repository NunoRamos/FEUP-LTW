<?php

include_once('../../database/dbUtils.php');

$reviewId = $_POST['reviewId'];
$restaurantId = $_POST['restaurantId'];

deleteReview($reviewId);

$link = "restaurant.php?id=".$restaurantId;
header('Location: '.$link);

