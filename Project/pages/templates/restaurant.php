<?php
include_once('utils/utils.php');
$_SESSION['token'] = generateRandomToken();
?>

<link rel="stylesheet" href="../css/restaurant.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">
<link rel="stylesheet" href="../css/box.css" type="text/css">
<link rel="stylesheet" href="../css/imageRestaurant.css" type="text/css">
<link rel="stylesheet" href="../css/design.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/restaurant.js"></script>

<div class="pageContent">
  <div class="design">
  <div id="restaurantInfo">
    <div id="imgLgRestaurant">
      <img id="restaurantImage" src="../images/icons/noImgRestaurant.png" alt="Restaurant Image">
      <div id="aux">
        <label id="restaurantName">
          <?php
          echo $_SESSION['restaurant']['name'];
          ?>
        </label>
        <br>
        <div id="info">
          <label>
            <div id="restaurantType"> <?php echo $_SESSION['restaurant']['type']; ?> </div>
            <div id="restaurantLocation"> <?php echo $_SESSION['restaurant']['location']; ?> </div>
            <div id="restaurantPhone"> <?php echo $_SESSION['restaurant']['phone_number']; ?> </div>
            <div id="restaurantPrice"> <?php echo $_SESSION['restaurant']['price']; ?>€</div>
          </label>
          <div id="star">
            <?php echo $_SESSION['restaurant']['average']; ?>
            <img id="iconStar" src="../images/icons/star.png" alt="star" width="5.1%" height="5.1%">
          </div>
        </div>
      </div>
    </div>
    <br>
    <?php
    if((in_array($_SESSION['username'],$_SESSION['owners']) || $_SESSION['username'] == "administrator") && $_SESSION['page'] != 'editRestaurant.php') {
  echo '<div id="editButton">';
        echo '<form action="editRestaurant.php" method="post">';
        echo '<input class="buttonStyle" type="submit" value="Edit Restaurant">';
        echo '</form>';
        echo '</div>';
}
    ?>

    <div id="mapLocation">
      <img id="mapIcon" src="../images/icons/map.png" alt="icon map" height="100px">
      <iframe width="500" height="250" frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?q=<?php echo $_SESSION['restaurant']['location'];?>&key=AIzaSyB1g45KMgxhy_MQhXdiZtF7Kxm-hhNNbes" allowfullscreen>
          </iframe>
    </div>
</div>

<div id="reviewsDiv">
  <div id="reviewTitle">
    <label id="Label">Reviews</label>
  </div>
    <?php
    foreach ($_SESSION['reviews'] as $review) {
  echo '<div class="reviewContainer">';
        if($review['userImage'] == "../images/user/default-user.png"){
            $imagePath = $review['userImage'];
        }
        else {
            $imagePath = '../images/user/'.$review['userImage'];
        }
        echo '<img class="userImage" src='.$imagePath.' alt="User image">';
        echo '<div class="divReview">';
        echo '<div><div id="userNameReply">'.$review['fullName'].'</div> gives '.$review['grade'].'/10 at '.$review['date'].'</div>';
        echo '<div>'.$review['text'].'</div>';
        $replies = $review['replies'];
        echo '<div class="showRepliesLink">Show Replies/Add Reply</div>';
        echo '<div hidden>';
        if(sizeof($replies)){
            foreach ($review['replies'] as $reply) {
                echo '<div class="reviewReplyStyle">';
                $imagePath = '../images/user/'.$reply['user_photo'];
                echo '<img class="userImageReply" src='.$imagePath.' alt="User image">';
                echo '<div>';
                echo '<div>' . $reply['fullName'] . ' reply at '.$reply['date'].'</div>';
                echo '<div>' . $reply['text'] . '</div>';
                echo '</div>';
                if($_SESSION['username'] == $reply['id_user'] || $_SESSION['username'] == "administrator") {
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
        if($_SESSION['username']==$review['id_user'] || $_SESSION['username'] == "administrator") {
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
        echo '<p>Leave a grade:<input type="number" name="grade" min="0" max="5" step="1" required></p>';
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
</div>
</div>
<?php
