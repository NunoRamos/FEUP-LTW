<?php
include_once('../../database/dbUtils.php');
session_start();

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

    if($_SESSION['error_size'] !=1 && $_SESSION['error_ext']!=1){
        move_uploaded_file($file_tmp,"../../images/user/".$file_name);

        $userImg = getUserImage($_SESSION['username']);
        $number_of_rows = sizeof($userImg);

        if($number_of_rows === 0)
            createUserImage($_SESSION['username'], $file_name);
        else
            updateUserImage($_SESSION['username'], $file_name);

        header("Location: ../actions/userProfile.php");
    }
    else{
        header("Location: ../actions/userProfile.php");
    }
}

