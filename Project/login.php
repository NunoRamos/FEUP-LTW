<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];
echo '<p>'. $username.'</p>';
$db = new PDO('sqlite:database/database.db');

$stmt = $db->prepare("SELECT * FROM user WHERE username == '".$username."'");
$stmt->execute();
$result = $stmt->fetchAll();
$number_of_rows = sizeof($result);

if($number_of_rows != 0 && $result[0]["username"] == $username && $result[0]["password"] == $password){
    echo '<header><p>Estas logado</p></header>';
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
}
else echo '<header><p>Login falhou</p></header>';

echo '<p>'.$result[0]["password"].'</p><br>';
echo '<p>'.$_SESSION['username'].'</p>';

header('Location: index.php');
?>