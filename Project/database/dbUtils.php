<?php

include_once('connection.php');

function getUser($username){
    global $db;

    $stmt = $db->prepare("SELECT * FROM user WHERE username == ?");
    $stmt->execute(Array($username));
    $result = $stmt->fetchAll();

    return $result;
}

function putUser($username,$password,$name,$email,$gender){
    global $db;

    $stmt = $db->prepare("INSERT INTO user VALUES(?,?,?,?,?)");
    $stmt->execute(array($username,$password,$name,$email,$gender));
}

function getRestaurantsNames(){
  global $db;

  $stmt = $db->prepare("SELECT name FROM restaurant");
  $stmt->execute();
  $result = $stmt->fetchAll();

  return $result;

}

function getRestaurantsTypes(){
    global $db;

    $stmt = $db->prepare("SELECT type FROM restaurant");
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;

}
