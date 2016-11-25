<?php
include_once('header.php');

include_once ('mainPageContent.php');

include_once('footer.php');

$username = $_POST["username"];
$password = $_POST["password"];
$db = new PDO('sqlite:database/database.db');

$stmt = $db->prepare('SELECT * FROM user');
$stmt->execute();
$result = $stmt->fetchAll();
?>