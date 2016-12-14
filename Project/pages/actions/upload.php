<?php

include_once('../../database/dbUtils.php');
session_start();

$type = $_POST['type'];

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $extensions= array("jpeg","jpg","png", "JPG");
    $_SESSION['error_size']=0;
    $_SESSION['error_ext']=0;

    if(in_array($file_ext,$extensions)=== false){
        $_SESSION['error_ext']=1;
    }

    if($file_size > 2097152){
        $_SESSION['error_size']=1;
    }

    if($type == "user") {
        if ($_SESSION['error_size'] != 1 && $_SESSION['error_ext'] != 1) {
            $file_name = $_SESSION['username'] . '.' . $file_ext;
            move_uploaded_file($file_tmp, "../../images/user/" . $file_name);

            updateUserImage($_SESSION['username'], $file_name);
            $_SESSION['userPhotoPath'] = $file_name;


            header("Location: ../actions/userProfile.php");

        } else {

            header("Location: ../actions/userProfile.php");

        }
    }
    else {
        if ($_SESSION['error_size'] != 1 && $_SESSION['error_ext'] != 1) {
            $restaurantId = $_POST['restaurantId'];
            $file_name = $restaurantId. '.' . $file_ext;
            move_uploaded_file($file_tmp, "../../images/restaurants/" .$file_name);

            updateRestaurantImage($restaurantId, $file_name);
            $_SESSION['restaurant']['restaurantPhotoPath'] = '../images/restaurants/'.$file_name;

            header("Location: ../editRestaurant.php");

        } else {

            header("Location: ../editRestaurant.php");

        }
    }
}
