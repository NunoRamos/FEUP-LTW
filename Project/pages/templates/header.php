<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Restaurant</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/header.css" type="text/css">
        <?php
        if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
  echo '<p> Logado como '. $_SESSION['username'] . '</p><br>';
            echo '<form action="actions/logout.php">
                <input type="submit" value="Logout"/>
                </form>';
}

else {
  // <div id="header">
            echo '<form action="loginPage.php">
                <input type="submit" value="login">
                </form>';
            echo '<form action="signup.php">
                <input type="submit" value="Create Account">
                </form>';
                // </div>
}
        ?>
        <h4>The best restaurant website!!</h4>
    </head>
    <body>
