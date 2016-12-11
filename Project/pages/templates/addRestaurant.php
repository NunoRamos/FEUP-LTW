<?php
session_start();
?>

<!-- Imagem -->
<link rel="stylesheet" href="../css/imageRestaurant.css" type="text/css">
<!-- button -->
<link rel="stylesheet" href="../css/button.css" type="text/css">
<!-- box -->
<link rel="stylesheet" href="../css/box.css" type="text/css">
<link rel="stylesheet" href="../css/addRestaurant.css" type="text/css">

<div class="pageContent">
  <div id="addRestaurantForm">
    <?php
    if(isset($_SESSION['invalid_restaurant']) && $_SESSION['invalid_restaurant']){
        echo '<div id="addRestaurantError">
        <span>Invalid Restaurant</span>
        </div>';
    }
    ?>
    <!-- <label id="titleAdd">
      Restaurant Information
    </label>
    <br>
    <br> -->
      <form action="actions/addRestaurant.php" method="get">
        <label>
          Name:
          <br>
          <input id="nameR" class="box" type="text" name="name" required>
          <br>
          <br>
        </label>
        <label>
          Location:
          <br>
          <input id="locationR" class="box" type="text" name="location" required>
          <br>
          <br>
        </label>
        <label>
          Type
          <select class="box" name="type" required>
            <?php
              include_once('templates/restaurantTypes.php');
            ?>
          </select>
          <br>
          <br>
        </label>
        <input id="buttonAddRestaurant" class="buttonStyle" type="submit" value="Add Restaurant">
    </form>
  </div>
  <div id="backButonAddRestaurant">
    <form action="mainPage.php" method="post" class="formBack">
      <input class="buttonStyle" type="submit" value="Back to main Page">
    </form>
  </div>
</div>
