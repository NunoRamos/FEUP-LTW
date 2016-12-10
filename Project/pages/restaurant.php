<?php
session_start();

$_SESSION['page'] = 'restaurant.php';

include_once('templates/header.php');
?>

<link rel="stylesheet" href="../css/restaurant.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">

<div>
    <h2 id="restaurantName"><?php echo $_SESSION['restaurant']['name']; ?></h2>

    <?php
        if(in_array($_SESSION['username'],$_SESSION['owners']) && $_SESSION['page'] != 'editRestaurant.php'){
            echo '<div id="editButton">
                <form action="editRestaurant.php" method="post"> 
                    <input class="buttonStyle" type="submit" value="Edit Restaurant">
                </form>
               </div>';
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
            echo '<div id="divReview">
                <div>'.$review['id_user'].'</div>
                <div>'.$review['text'].'</div>
                <div>'.$review['grade'].'</div>
            </div>';
        }
    ?>
</div>
<div>
    <?php
    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
        echo '<h3 id="leaveReviewHeader">Leave Your Review</h3>
            <div id="leaveReview">
                <form action="actions/review.php" method="post">
                    <textarea type="text" cols="40" rows="10" name="text" required></textarea>
                    <p>Leave a grade:<input type="number" name="grade" min="0" max="10" step="1" required></p>
                    <input type="submit" value="Send Review">
                </form>
            </div>';
    }
    else {
        echo '<div id="reviewNotLogued">
        <a href="login.php">To leave a review, just log in</a>
        </div>';
    }
    ?>
</div>

<?php include_once('templates/footer.php'); ?>