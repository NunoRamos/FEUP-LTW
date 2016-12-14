<?php

include_once('utils/utils.php');

?>

<link rel="stylesheet" href="../css/profile.css" type="text/css">
<link rel="stylesheet" href="../css/lettering.css" type="text/css">
<!--link rel="stylesheet" href="../css/imageMainPage.css" type="text/css"-->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">


<div id="test">
    <div id="pageContent">

        <div id="userNameSU">
            <?php
            if($_SESSION['profile_img'] == "../images/user/default-user.png"){
                echo '<img id="logoImage" src="../images/user/default-user.png" alt="logo" height="200px">';
            }
            else
                echo '<img id="logoImage" src=../images/user/'. $_SESSION['profile_img'].' alt="logo" height="200px">';
            ?>
            <div id="nameGenderCity">
                <?php
                echo '<h3 id="nameAndGender">';
                echo $_SESSION['profile_userInfo']['name'];
                echo ', ';
                echo $_SESSION['profile_userInfo']['gender'];
                echo '</h3>';
                echo '<h3 id="userCity">';
                echo $_SESSION['profile_userInfo']['city'];
                echo '</h3>';
                ?>
            </div>
            <h3 id="numberOfReviews">Number of Reviews:  <?php echo $_SESSION['number_of_reviews'][0]; ?></h3>
            <h3 id="restaurantsOwnedTitle">Restaurants owned</h3>
            <div id="allUserRestaurants">
                <?php
                foreach($_SESSION['profile_restaurantsInfo'] as $restaurant){
                    echo "<div class=oneMoreUserRestaurant>";
                    $link = "actions/restaurant.php?id=".$restaurant[0]['id'];
                    echo '<a href='.$link.'>'.$restaurant[0]['name'].' in '.$restaurant[0]['location'].'</a>';
                    echo "</div>";
                }
                ?>
            </div>

        </div>

    </div>
</div>

