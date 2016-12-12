<?php

include_once('connection.php');

/** Gets the user with username
 * @param $username username to be search
 * @return array results of the search
 */
function getUser($username){
    global $db;

    $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute(array($username));
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

/** Add a review to the review table
 * @param $id_restaurant
 * @param $id_user
 * @param $text
 * @param $grade
 */
function putReview($id_restaurant,$id_user, $text, $grade){
    global $db;

    $stmt = $db->prepare("INSERT INTO review VALUES(NULL,?,?,?,?)");
    $stmt->execute(array($id_restaurant,$id_user,$text,$grade));
}

/** Add a restaurant to the restaurant table
 * @param $name
 * @param $location
 * @param $type
 */
function putRestaurant($name,$location,$type){
    global $db;

    $stmt = $db->prepare("INSERT INTO restaurant VALUES(NULL,?,?,?)");
    $stmt->execute(array($name,$location,$type));
}

/** Gets a restaurant by name
 * @param $name
 * @return array
 */
function getRestaurantByName($name){
    global $db;

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE name == ?");
    $stmt->execute(array($name));
    $result = $stmt->fetchAll();

    return $result;
}

/** Adds a owner to a restaurant
 * @param $id_restaurant
 * @param $id_user
 */
function addOwner($id_restaurant,$id_user){
    global $db;

    $stmt = $db->prepare("INSERT INTO owner VALUES(?,?)");
    $stmt->execute(array($id_restaurant,$id_user));
}

/** Gets the owner/owners of a given restaurant
 * @param $id_restaurant
 * @return array
 */
function getOwners($id_restaurant){
    global $db;

    $stmt = $db->prepare("SELECT username FROM owner WHERE id_restaurant == ?");
    $stmt->execute(array($id_restaurant));
    $result = $stmt->fetchAll();

    return $result;
}

/** Updates the restaurante name
 * @param $id_restaurant
 * @param $new_name
 * @return bool
 */
function updateRestaurantName($id_restaurant,$new_name){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET name=? WHERE id=?");
    return $stmt->execute(array($new_name,$id_restaurant));


}

/** Updates the restaurante type
 * @param $id_restaurant
 * @param $new_type
 * @return bool
 */
function updateRestaurantType($id_restaurant,$new_type){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET type=? WHERE id=?");
    return $stmt->execute(array($new_type,$id_restaurant));
}

/** Updates the restaurante location
 * @param $id_restaurant
 * @param $new_location
 * @return bool
 */
function updateRestaurantLocation($id_restaurant,$new_location){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET location=? WHERE id=?");
    return $stmt->execute(array($new_location,$id_restaurant));
}

/** Get replies of a given review
 * @param $id_review
 * @return array
 */
function getReplies($id_review){
    global $db;

    $stmt = $db->prepare("SELECT * FROM reply WHERE id_review == ?");
    $stmt->execute(array($id_review));
    $result = $stmt->fetchAll();

    return $result;
}

/** Gets the id of all the user restaurants
 * @param $id_user
 * @return array
 */
function getUserRestaurants($id_user){
    global $db;

    $stmt = $db->prepare("SELECT id_restaurant FROM owner WHERE username == ?");
    $stmt->execute(array($id_user));
    $result = $stmt->fetchAll();

    return $result;
}

/** Updates user email
 * @param $id_user
 * @param $new_email
 * @return bool
 */
function updateUserEmail($id_user,$new_email){
    global $db;

    $stmt = $db->prepare("UPDATE user SET email=? WHERE username=?");
    return $stmt->execute(array($new_email,$id_user));
}

/** Updates user full name
 * @param $id_user
 * @param $new_full_name
 * @return bool
 */
function updateUserFullName($id_user,$new_full_name){
    global $db;

    $stmt = $db->prepare("UPDATE user SET name=? WHERE username=?");
    return $stmt->execute(array($new_full_name,$id_user));
}

/** Updates user gender
 * @param $id_user
 * @param $new_gender
 * @return bool
 */
function updateUserGender($id_user,$new_gender){
    global $db;

    $stmt = $db->prepare("UPDATE user SET gender=? WHERE username=?");
    return $stmt->execute(array($new_gender,$id_user));
}

/** Adds the replys to the database
 * @param $id_review
 * @param $id_user
 * @param $text_reply
 */
function addReply($id_review,$id_user,$text_reply){
    global $db;

    $stmt = $db->prepare("INSERT INTO reply VALUES(NULL,?,?,?)");
    $stmt->execute(array($id_review,$id_user,$text_reply));
}