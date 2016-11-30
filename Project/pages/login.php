<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Log-in</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/loginPage.css" type="text/css">
</head>
<body>
<div id="userName">
    <?php
        if(isset($_SESSION['incorrectLogin_flag']) && $_SESSION['incorrectLogin_flag']==1){
            echo '<div>
            <span style="color:#FF0000;">
            Incorrect username or password.</span>
            </div>';
        }
    ?>
    <form action="actions/login.php" method="post" class="formUser">
        <label>
          Username:
          <br>
          <input type="text" name="username" placeholder="Email ou Username">
          <br>
        </label>
        <label>
          <br>
          Password:
          <br>
          <input type="password" name="password" placeholder="Password">
          <br>
        </label>
        <br>
        <br>
        <input type="submit" value="Login">
    </form>
    <div>
        <form action="mainPage.php" method="post" class="formBack">
          <!-- <input type="submit" value="Login"> -->
            <input type="submit" value="Back to main Page">
        </form>
    </div>
</div>
</body>
</html>
