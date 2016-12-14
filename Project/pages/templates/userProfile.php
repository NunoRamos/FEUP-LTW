<?php

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();

?>

<link rel="stylesheet" href="../css/userProfile.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">
<link rel="stylesheet" href="../css/box.css" type="text/css">

<div class="test">
    <div id="userEditMainDiv">

        <form id="editUserForm" action="actions/editUser.php" method="post">

            <input type="hidden" name="token" value=<?php echo $_SESSION['token']; ?>>

            <?php
            if($_SESSION["profile_updated"]){
                echo '<p id="changesMaded">Changes made successfully</p>';
                echo '<img id="rightImage" src="../images/right.png" alt="Restaurant Image">';
            }
            ?>

            <h2 id="headerFormUser">Edit Page!</h2>

            <p id="editUserName"><?php echo $_SESSION['userInfo']['username']; ?></p>

            <input id="editUserEmail" class="box" type="text" name="newEmail" value="<?php echo $_SESSION['userInfo']['email']; ?> ">

            <input id="editUserFullName" class="box" type="text" name="newFullName" value="<?php echo $_SESSION['userInfo']['name']; ?>">

            <select class="box" id="editGenderDropDown" name="newGender">
                <option value="male">Male</option>
                <option value="Female">Female</option>
            </select>

            <input id="editSubmitButton" class="buttonStyle" type="submit" value="Edit Profile">
        </form>

        <div id="userRestaurantContainer">
            <h2 id="userRestaurantsHeader">Your restaurants</h2>
            <?php
            foreach ($_SESSION['userRestaurants'] as $restaurant){
                $link = "actions/restaurant.php?id=".$restaurant[0]['id'];
                echo '<a class=restaurantInfo href='.$link.'>'.$restaurant[0]['name'].' in '.$restaurant[0]['location'].'</a>';
            }
            ?>
        </div>

        <div id="photoContainer">
            <?php
            if($_SESSION['userPhotoPath'] == "../images/user/default-user.png")
                echo '<img id="editUserImage" src='.$_SESSION['userPhotoPath'].' alt="User Image">';
            else echo '<img id="editUserImage" src=../images/user/'.$_SESSION['userPhotoPath'].' alt="User Image">';
            ?>
            <form id="formToUploadUserImage" action="actions/upload.php" method="post" enctype="multipart/form-data">
                <div id="uploadButtonAndText">
                    Select image:
                    <input required type="file" name="image">
                </div>
                <input type="hidden" name="type" value="user">
                <input id="editSubmitButton" class="buttonStyle" type="submit" value="Upload Photo">
            </form>

        </div>

    </div>
</div>