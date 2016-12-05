<?php
session_start();

include_once('templates/header.php');
?>

<link rel="stylesheet" href="../css/restaurant.css" type="text/css">
<div>
    <h2 id="restaurantName"><?php echo $_SESSION['restaurant']['name']; ?></h2>
    <h4>
        <div id="restaurantType"> <?php echo $_SESSION['restaurant']['type']; ?> </div>
        <div id="restaurantLocation"> <?php echo $_SESSION['restaurant']['location']; ?> </div>
    </h4>
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
        echo '<h3>Leave Your Review</h3>
        <form action="actions/review.php" method="post">
          <input type="text" name="text" placeholder="text">
         <p>Leave a grade:<input type="number" name="grade" min="0" max="10" step="1"></p>
        </form>';
    }
    else {
        echo '<div id="reviewNotLogued">
        <a href="login.php">To leave a review, just log in</a>
        </div>';
    }
    ?>
</div>

<?php include_once('templates/footer.php'); ?>