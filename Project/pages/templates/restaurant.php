<?php

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();

?>

<link rel="stylesheet" href="../css/restaurant.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/restaurant.js"></script>

<div>
    <h2 id="restaurantName"><?php echo $_SESSION['restaurant']['name']; ?></h2>

    <?php
    if(in_array($_SESSION['username'],$_SESSION['owners']) && $_SESSION['page'] != 'editRestaurant.php'){
        echo '<div id="editButton">';
        echo '<form action="editRestaurant.php" method="post">';
        echo '<input class="buttonStyle" type="submit" value="Edit Restaurant">';
        echo '</form>';
        echo '</div>';
    }
    ?>
    <h4>
        <div id="restaurantType"> <?php echo $_SESSION['restaurant']['type']; ?> </div>
        <div id="restaurantLocation"> <?php echo $_SESSION['restaurant']['location']; ?> </div>
    </h4>
    <div>
        <img id="restaurantImage" src="../images/restaurants/default-restaurant-icon.jpg" alt="Restaurant Image">
    </div>
</div>

<div>
    <h3 id="reviewTitle">Reviews</h3>
    <?php
    foreach ($_SESSION['reviews'] as $review){

        echo '<div class="reviewContainer">';
        echo '<img class="userImage" src="../images/user/default-user.png" alt="User image">';
        echo '<div class="divReview">';
        echo '<div>'.$review['fullName'].' gives '.$review['grade'].'/10</div>';
        echo '<div>'.$review['text'].'</div>';

        $replies = $review['replies'];

        echo '<div class="showRepliesLink">Show Replies/Add Reply</div>';

        echo '<div hidden>';
        if(sizeof($replies)){

            foreach ($review['replies'] as $reply) {
                echo '<div class="reviewReplyStyle">';
                echo '<div>';
                echo '<div>' . $reply['fullName'] . ' reply</div>';
                echo '<div>' . $reply['text'] . '</div>';
                echo '</div>';
                if($_SESSION['username'] == $reply['id_user']) {
                    echo '<form class="formToDeleteReply" action="actions/deleteReviewsAndReplies.php" method="post">';
                    echo '<input type="hidden" name="isAReview" value=0>';
                    echo '<input type="hidden" name="replyId" value=' . $reply['id'] . '>';
                    echo '<input type="hidden" name="restaurantId" value='.$_SESSION['restaurant']['id'].'>';
                    echo '<input class="deleteReview" type="submit" value="X">';
                    echo '</form>';
                }
                echo '</div>';
            }
        }

        if(isset($_SESSION['username'])) {
            echo '<form id="addReplyForm" action="actions/addReply.php" method="post">';
            echo '<input type="hidden" name="token" value='.$_SESSION['token'].'>';
            echo '<input type="hidden" name="reviewId" value='.$review['id'].'>';
            echo '<input type="hidden" name="restaurantId" value='.$_SESSION['restaurant']['id'].'>';
            echo '<input type="text" name="replyText">';
            echo '<input type="submit" value="Add Reply">';
            echo '</form>';
        }
        echo '<div class="hideRepliesLink">Hide Replies</div>';
        echo '</div>';

        echo '</div>';
        if($_SESSION['username']==$review['id_user']){
            echo '<form action="actions/deleteReviewsAndReplies.php" method="post">';
            echo '<input type="hidden" name="isAReview" value="1">';
            echo '<input type="hidden" name="reviewId" value='.$review['id'].'>';
            echo '<input type="hidden" name="restaurantId" value='.$_SESSION['restaurant']['id'].'>';
            echo '<input class="deleteReview" type="submit" value="X">';
            echo '</form>';
        }
        echo '</div>';
    }
    ?>
</div>
<div>
    <?php
    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
        echo '<h3 id="leaveReviewHeader">Leave Your Review</h3>';
        echo '<div id="leaveReview">';
        echo '<form action="actions/review.php" method="post">';
        echo '<input type="hidden" name="token" value='.$_SESSION['token'].'>';
        echo '<textarea type="text" cols="40" rows="10" name="text" required></textarea>';
        echo '<p>Leave a grade:<input type="number" name="grade" min="0" max="10" step="1" required></p>';
        echo '<input type="submit" value="Send Review">';
        echo '</form>';
        echo '</div>';
    }
    else {
        echo '<div id="reviewNotLogued">';
        echo '<a href="login.php">To leave a review, just log in</a>';
        echo '</div>';
    }
    ?>
</div>

