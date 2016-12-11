<?php
session_start();
?>
<div class="pageContent">
    <?php
    if(isset($_SESSION['invalid_restaurant']) && $_SESSION['invalid_restaurant']){
        echo '<p>Invalid Restaurant</p>';
    }
    ?>
    <form action="actions/addRestaurant.php" method="get">
        <input type="text" name="name" required>
        <input type="text" name="location" required>
        <select name="type" required>
            <?php
                include_once('templates/restaurantTypes.php');
            ?>
        </select>
        <input type="submit" value="Add Restaurant">
    </form>
</div>
