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

        <input id="editRestaurantLocation" type="text" name="newPhone" value="<?php echo $_SESSION['restaurant']['phone_number']; ?>">

        <input id="editRestaurantLocation" type="text" name="newPrice" value="<?php echo $_SESSION['restaurant']['price']; ?>">

        <input id="editSubmitButton" class="buttonStyle" type="submit" value="Edit restaurant">

    </form>
    <img id="editRestaurantImage" src=<?php echo $_SESSION['restaurant']['restaurantPhotoPath']; ?>r alt="Restaurant Image">

    <form action="actions/upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input required type="file" name="image">
        <input type="hidden" name="type" value="restaurant">
        <input type="hidden" name="restaurantId" value=<?php echo $_SESSION['restaurant']['id']; ?>>
        <input id="editSubmitButton" class="buttonStyle" type="submit" value="Upload Photo">
    </form>

    <form id="deleteForm" action="actions/editRestaurant.php" method="post">
        <input type="hidden" name="deleteRestaurant" value="1">
        <input class="buttonStyle" type="submit" value="Delete Restaurant">
    </form>
</div>
