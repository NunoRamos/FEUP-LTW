<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head id="head">
        <title>My Restaurant</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/header.css" type="text/css">
        <link rel="stylesheet" href="../css/footer.css" type="text/css">
        <?php
        if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
  echo '<p> Logado como '. $_SESSION['username'] . '</p><br>';
            echo '<form action="actions/logout.php">
                <input type="submit" value="Logout"/>
                </form>';
        }
        else {
            echo '<form action="login.php">
                <input type="submit" value="login">
                </form>';
            echo '<form action="signup.php">
                <input type="submit" value="Create Account">
                </form>';

        }
        ?>
        <h4>The best restaurant website!!</h4>
        <?php
        echo '
        <form action="actions/restaurantSearch.php" method="post">
            <input required type="text" name="search" placeholder="Search Restaurants">
            <input type="submit" value="search">
        </form>
        ';
        ?>


    </head>
    <body>
