<?php

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();

?>

<link rel="stylesheet" href="../css/userProfile.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">


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

        <input id="editUserEmail" type="text" name="newEmail" value="<?php echo $_SESSION['userInfo']['email']; ?> ">

        <input id="editUserFullName" type="text" name="newFullName" value="<?php echo $_SESSION['userInfo']['name']; ?>">

        <select name="newGender">
            <option value="male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input id="editSubmitButton" class="buttonStyle" type="submit" value="Edit restaurant">
    </form>

    <div id="userRestaurantContainer">
        <?php
        foreach ($_SESSION['userRestaurants'] as $restaurant){
            $link = "actions/restaurant.php?id=".$restaurant[0]['id'];
            echo '<a id=restaurantInfo href='.$link.'>'.$restaurant[0]['name'].' in '.$restaurant[0]['location'].'</a>';
        }
        ?>
    </div>

    <div id="photoContainer">
        <img id="editUserImage" src="../images/user/default-user.png" alt="Restaurant Image">
        <input id="editSubmitButton" class="buttonStyle" type="submit" value="Upload Photo">
    </div>

</div>