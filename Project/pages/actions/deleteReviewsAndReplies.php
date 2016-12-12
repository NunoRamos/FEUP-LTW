<?php

include_once('../../database/dbUtils.php');

$isAReview = $_POST['isAReview'];
$restaurantId = $_POST['restaurantId'];

if($isAReview) {

    $reviewId = $_POST['reviewId'];

    deleteReview($reviewId);
}
else {

    $replyId = $_POST['replyId'];

    deleteReply($replyId);
}

$link = "restaurant.php?id=" . $restaurantId;
header('Location: ' . $link);
