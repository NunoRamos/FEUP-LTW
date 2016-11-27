<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Restaurant</title>
        <meta charset="utf-8">
        <?php
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            echo '<p> Logado como '. $_SESSION['username'] . '</p><br>';
            echo '<form action="logout.php">
                <input type="submit" value="Logout"/>
                </form>';
        }
        else {
            echo '<form action="loginPage.php">
                <input type="submit" value="login">
                </form>';
            echo '<form action="signup.php">
                <input type="submit" value="Create Account">
                </form>';
        }
        ?>
        <h4>The best restaurant website!!</h4>
    </head>
    <body>