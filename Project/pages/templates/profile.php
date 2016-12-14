<?php

include_once('utils/utils.php');

?>

<link rel="stylesheet" href="../css/profile.css" type="text/css">
<link rel="stylesheet" href="../css/lettering.css" type="text/css">
<!--link rel="stylesheet" href="../css/imageMainPage.css" type="text/css"-->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">


<div id="pageContent">



    <div id="userNameSU">
            <img id="logoImage" src="<?php echo $_SESSION['profile_img'] ;?>" alt="logo" height="200px">
            <br>
            <h3 class="profile"><?php
            echo $_SESSION['profile_userInfo']['name'];
            echo ', ';
            echo $_SESSION['profile_userInfo']['gender'];
            echo"<br>";
            echo "</h3><h3 class=\"profile\">";
            echo $_SESSION['profile_userInfo']['city'];
                ?></h3>
            <br><h3 class="profile">
            Number of Reviews

            <?php
            echo $_SESSION['number_of_reviews'][0];
            ?>
        </h3>
            <br>
        <h3 class="profile">Restaurants owned</h3>

            <?php
                foreach($_SESSION['profile_restaurantsInfo'] as $restaurant){
                    echo "<h4 class=\"profile\">";
                    $link = "actions/restaurant.php?id=".$restaurant[0]['id'];
                    echo '<a href='.$link.'>'.$restaurant[0]['name'].' in '.$restaurant[0]['location'].'</a>';
                echo "</h4>";
                }
            ?>

    </div>

</div>

