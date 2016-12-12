<?php

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();

?>

<link rel="stylesheet" href="../css/restaurant.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">

<div id="restaurantEditMainDiv">
    <form id="editForm" action="actions/editRestaurant.php" method="post">
        <input type="hidden" name="token" value=<?php echo $_SESSION['token']; ?>>

        <h2>Edit Page!</h2>

        <input id="editRestaurantName" type="text" name="newName" value="<?php echo $_SESSION['restaurant']['name']; ?>">

        <input id="editRestaurantType" type="text" name="newType" value="<?php echo $_SESSION['restaurant']['type']; ?> ">

        <input id="editRestaurantLocation" type="text" name="newLocation" value="<?php echo $_SESSION['restaurant']['location']; ?>">

        <img id="editRestaurantImage" src="../images/restaurants/default-restaurant-icon.jpg" alt="Restaurant Image">

        <input id="editSubmitButton" class="buttonStyle" type="submit" value="Edit restaurant">

    </form>
    <form id="deleteForm" action="actions/editRestaurant.php" method="post">
        <input type="hidden" name="deleteRestaurant" value="1">
        <input class="buttonStyle" type="submit" value="Delete Restaurant">
    </form>
</div>
