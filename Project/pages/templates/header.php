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
      <div id="logoImageHeader">
        <img src="../images/logo.png" alt="logo" height="50px">
      </div>
        <?php
        if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
            echo '<div class="button">
                   <form action="actions/logout.php">
                        <input class="buttonStyle buttonMargin" type="submit" value="Logout"/>
                   </form>
                  </div>';
            echo '<div class="button">
                    <form action="addRestaurant.php">
                        <input class="buttonStyle buttonMargin" type="submit" value="Add a restaurant">
                    </form>
                   </div>';
        }

        else {
            echo '<div class="button">
                    <form action="login.php">
                    <input class="buttonStyle buttonMargin" type="submit" value="Sign In">
                    </form>
                  </div>';
            echo '<div class="button">
                    <form action="signup.php">
                    <input class="buttonStyle buttonMargin" type="submit" value="Sign Up">
                    </form>
                  </div>';
        }
        ?>
    </div>
</header>
