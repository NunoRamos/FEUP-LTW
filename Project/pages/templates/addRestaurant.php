<?php
session_start();

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();

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
      <form action="actions/addRestaurant.php" method="get">
        <input type="hidden" name="token" value=<?php echo $_SESSION['token'];?>>
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
          Phone:
          <input id="phone" class="box" type="text" name="phone" min="0" max="9"required>
          <br>
          <br>
        </label>
        <label>
          Price:
          <span>€ <input id="price" class="box" type="text" name="price" required></span
          <br>
          <br>
        </label>
        <label id="typeSelect">
          Type
          <select class="box" name="type" required>
            <?php
              include_once('templates/restaurantTypes.php');
            ?>
          </select>
          <br>
          <br>
        </label>
        <br>
        <input id="buttonAddRestaurant" class="buttonStyle" type="submit" value="Add Restaurant">
    </form>
  </div>
  <div id="backButonAddRestaurant">
    <form action="mainPage.php" method="post" class="formBack">
      <input class="buttonStyle" type="submit" value="Back to main Page">
    </form>
  </div>
</div>
