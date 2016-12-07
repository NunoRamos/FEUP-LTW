<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head id="head">
        <title>My Restaurant</title>
        <!-- ICON -->
        <link rel="shortcut icon" type="image/png" href="../images/logoIcon.ico" />
        <!--  -->
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/header.css" type="text/css">
        <link rel="stylesheet" href="../css/footer.css" type="text/css">
        <!-- letra -->
        <link rel="stylesheet" href="../css/lettering.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">

    </head>
    <body>
    <header id="header">
        <?php
        if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
            echo '<p> Logado como '. $_SESSION['username'] . '</p><br>';
            echo '<form action="actions/logout.php">
                    <input type="submit" value="Logout"/>
                    </form>';
        }
        else {
            echo '<div class="button">
                    <form action="login.php">
                    <input class="buttonStyle" type="submit" value="Sign In">
                    </form>
                  </div>';
            echo '<div class="button">
                    <form action="signup.php">
                    <input class="buttonStyle" type="submit" value="Sign Up">
                    </form>
                  </div>';

        }
    ?>
    </header>
