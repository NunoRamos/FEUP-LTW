<?php

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();

?>

<link rel="stylesheet" href="../css/restaurant.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">
<link rel="stylesheet" href="../css/box.css" type="text/css">

<div class="test">
    <div id="restaurantEditMainDiv">
        <form id="editForm" action="actions/editRestaurant.php" method="post">
            <input type="hidden" name="token" value=<?php echo $_SESSION['token']; ?>>

            <h2 id="editHeader">Edit Page!</h2>

            <input id="editRestaurantName" class="box" type="text" name="newName" value="<?php echo $_SESSION['restaurant']['name']; ?>">

            <input id="editRestaurantType" class="box" type="text" name="newType" value="<?php echo $_SESSION['restaurant']['type']; ?> ">

            <input id="editRestaurantLocation" class="box" type="text" name="newLocation" value="<?php echo $_SESSION['restaurant']['location']; ?>">

            <input id="editRestaurantLocation" class="box" type="text" name="newPhone" value="<?php echo $_SESSION['restaurant']['phone_number']; ?>">

            <input id="editRestaurantLocation" class="box" type="text" name="newPrice" value="<?php echo $_SESSION['restaurant']['price']; ?>">

            <input id="editSubmitButton" class="buttonStyle" type="submit" value="Edit restaurant">

        </form>
        <div id="changeImageDiv">
            <img id="editRestaurantImage" src=<?php echo $_SESSION['restaurant']['restaurantPhotoPath']; ?> alt="Restaurant Image">

            <form id="restaurantImageUpload" action="actions/upload.php" method="post" enctype="multipart/form-data">
                <div id="restaurantImageUploadText">
                    Select image to upload:
                    <input required type="file" name="image">
                    <input type="hidden" name="type" value="restaurant">
                </div>
                <input type="hidden" name="restaurantId" value=<?php echo $_SESSION['restaurant']['id']; ?>>
                <input id="editSubmitButton" class="buttonStyle" type="submit" value="Upload Photo">
            </form>
        </div>

        <form id="deleteForm" action="actions/editRestaurant.php" method="post">
            Danger Zone:<br>
            <input type="hidden" name="deleteRestaurant" value="1">
            <input id="deleteButton" class="buttonStyle" type="submit" value="Delete Restaurant">
        </form>
    </div>
</div>
