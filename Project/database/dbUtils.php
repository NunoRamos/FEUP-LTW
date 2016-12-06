<?php

include_once('connection.php');

/** Gets the user with username
 * @param $username username to be search
 * @return array results of the search
 */
function getUser($username){
    global $db;

    $stmt = $db->prepare("SELECT * FROM user WHERE username == ?");
    $stmt->execute(Array($username));
    $result = $stmt->fetchAll();

    return $result;
}

/** Puts the newe user on the database
 * @param $username
 * @param $password
 * @param $name
 * @param $email
 * @param $gender
 */
function putUser($username,$password,$name,$email,$gender){
    global $db;

    $stmt = $db->prepare("INSERT INTO user VALUES(?,?,?,?,?)");
    $stmt->execute(array($username,$password,$name,$email,$gender));
}

/** Gets the restaurants names
 * @return array
 */
function getRestaurantsNames(){
  global $db;

  $stmt = $db->prepare("SELECT id,name FROM restaurant");
  $stmt->execute();
  $result = $stmt->fetchAll();

  return $result;

}

/** Gets the restaurant types
 * @return array
 */
function getRestaurantsTypes(){
    global $db;

    $stmt = $db->prepare("SELECT id,type FROM restaurant");
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;

}

/** Gets the given restaurant row
 * @param $restaurant
 */
function getRestaurant($id){
    global $db;

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE id ==?");
    $stmt->execute(array($id));
    $result = $stmt->fetchAll();

    return $result;

}

/** Gets the reviews of a restaurant
 * @param $id_restaurant id of the restaurant to search on reviews
 * @return array reviews of the given restaurant
 */
function getRestaurantReviews($id_restaurant){
    global $db;

    $stmt = $db->prepare("SELECT * FROM review WHERE id_restaurant == ?");
    $stmt->execute(array($id_restaurant));
    $result = $stmt->fetchAll();

    return $result;

}