<link rel="stylesheet" href="../css/userProfile.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">


<div id="userEditMainDiv">

    <form id="editUserForm" action="actions/editUser.php" method="post">

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
        <?php



       /*$userImg = $_SESSION['userImg'];
        $number_of_rows = sizeof($userImg);

        if($number_of_rows === 0){
            echo '<img id="editUserImage" src="../images/user/default-user.png" alt="Restaurant Image">';
        }
        else if($_SESSION['error_size']==1){
            echo '<p Image size excceds the limit of 2MB.</p>';
            echo '<img id="editUserImage" src="../images/user/default-user.png" alt="Restaurant Image">';
        }
        else if($_SESSION['error_ext']==1){
            echo '<p Pleae upload an image JPG, JPEG or PNG..</p>';
            echo '<img id="editUserImage" src="../images/user/default-user.png" alt="Restaurant Image">';
        }
        else*/
            echo '<img id="editUserImage" src='.$_SESSION['userPhotoPath'].' alt="Restaurant Image">';



        ?>

        <form action="actions/upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input required type="file" name="image">
            <input type="hidden" name="type" value="user">
            <input id="editSubmitButton" class="buttonStyle" type="submit" value="Upload Photo">
        </form>

    </div>

</div>