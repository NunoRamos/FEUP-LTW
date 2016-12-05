<!--p>Best Restaurant</p-->
<!--form action="actions/restaurantSearch.php" method="post">
  <input type="text" name="search" value="Search Restaurants">
  <input type="submit" value="search">
</form-->

<h4>The best restaurant website!!</h4>
<?php
echo '<form action="actions/restaurantSearch.php" method="post">
        <input required type="text" name="search" placeholder="Search Restaurants">
        <input type="submit" value="search">
        </form>';
?>
