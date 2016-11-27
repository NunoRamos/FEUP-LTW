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
</head>
<body>
<div>
    <?php
        if(isset($_SESSION['incorrectLogin_flag']) && $_SESSION['incorrectLogin_flag']==1){
            echo '<div>
            <span style="color:#FF0000;">
            Incorrect username or password.</span>
            </div>';
        }
    ?>
    <form action="login.php" method="post">
        Username<br>
        <input type="text" name="username"><br>
        Password<br>
        <input type="password" name="password"><br>
        <input type="submit" value="login">
    </form>
</div>
</body>
</html>