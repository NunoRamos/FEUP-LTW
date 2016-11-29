<!DOCTYPE html>
<html>
<head>
    <title>Log-in</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/signup.css" type="text/css">
</head>
<body>
<div>
    <?php
    session_start();
    $invalid_user = $_SESSION['invalid_user'];
        if($invalid_user) {
  echo '<p>Invalid username</p>';
}
    ?>
</div>
<div id="userNameSU">
    <form action="actions/signup.php" method="post">
        Username<br>
        <input type="text" name="username"><br>
        Password<br>
        <input type="password" name="password"><br>
        <input type="submit" value="Create Account">
    </form>
</div>
<div id="mainPageSU">
    <form action="mainPage.php" method="post">
        <input type="submit" value="Back to main Page">
    </form>
</div>
<?php
include_once('templates/footer.php');
?>
</html>
