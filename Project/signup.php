<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
if($username != null && $password != null){
    $db = new PDO('sqlite:database/database.db');
    $stmt = $db->prepare("INSERT INTO user VALUES(?,?)");
    $stmt->execute(array($username,$password));
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
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
    <form action="" method="post">
        Username<br>
        <input type="text" name="username"><br>
        Password<br>
        <input type="password" name="password"><br>
        <input type="submit" value="Create Account">
    </form>
</div>
<?php
include_once('footer.php');
?>
