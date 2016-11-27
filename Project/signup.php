<?php
session_start();
$invalid_user = 0;
$username = $_POST["username"];
$password = $_POST["password"];
if($username != null && $password != null){
    $db = new PDO('sqlite:database/database.db');

    $stmt = $db->prepare("SELECT * FROM user WHERE username == '".$username."'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $number_of_rows = sizeof($result);

    if($number_of_rows == 0){
        $stmt = $db->prepare("INSERT INTO user VALUES(?,?)");
        $stmt->execute(array($username,$password));
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        header('Location: index.php');
    }
    else {
        $username = null;
        $password = null;
        $invalid_user = 1;
    }
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
        if($invalid_user){
            echo '<p>Invalid username</p>';
        }
    ?>
</div>
<div>
    <form action="" method="post">
        Username<br>
        <input type="text" name="username"><br>
        Password<br>
        <input type="password" name="password"><br>
        <input type="submit" value="Create Account">
    </form>
</div>
<div>
    <form action="index.php" method="post">
        <input type="submit" value="Back to main Page">
    </form>
</div>
<?php
include_once('templates/footer.php');
?>
