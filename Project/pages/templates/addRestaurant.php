<div>
    <form action="actions/addRestaurant.php" method="get">
        <input type="text" name="name" required>
        <input type="text" name="location" required>
        <select name="type">
            <?php
                include_once('templates/restaurantTypes.php');
            ?>
        </select>
        <input type="submit" required>
    </form>
</div>