<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head id="head">
    <title>My Restaurant</title>
    <link rel="icon" type="image/png"  href="../images/logo.png" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/header.css" type="text/css">
    <link rel="stylesheet" href="../css/footer.css" type="text/css">
    <!-- button -->
    <link rel="stylesheet" href="../css/button.css" type="text/css">
    <!-- letra -->
    <link rel="stylesheet" href="../css/lettering.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">

</head>
<body>
<header id="header">
    <div id="headerDiv">
        <?php
        if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $link = "actions/userProfile.php";
            echo '<a class=buttonMargin href='.$link.'>Hello, '.$_SESSION['fullName'].' </a>';
            echo '<div class="button">';
            echo '<form action="actions/logout.php">';
            echo '<input class="buttonStyle buttonMargin" type="submit" value="Logout"/>';
            echo '</form>';
            echo '</div>';
            echo '<div class="button">';
            echo '<form action="addRestaurant.php">';
            echo '<input class="buttonStyle buttonMargin" type="submit" value="Add a restaurant">';
            echo '</form>';
            echo '</div>';
        }

        else {
            echo '<div class="button">';
            echo '<form action="login.php">';
            echo '<input class="buttonStyle buttonMargin" type="submit" value="Sign In">';
            echo '</form>';
            echo '</div>';
            echo '<div class="button">';
            echo '<form action="signup.php">';
            echo '<input class="buttonStyle buttonMargin" type="submit" value="Sign Up">';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
</header>
