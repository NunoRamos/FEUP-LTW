<?php
session_start();

$_SESSION['page'] = 'signup.php';

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png"  href="../images/logo.png" />
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="/js/sign_up.js"></script>
  <link rel="stylesheet" href="../css/reset.css" type="text/css">
  <link rel="stylesheet" href="../css/header.css" type="text/css">
  <link rel="stylesheet" href="../css/signup.css" type="text/css">
  <link rel="stylesheet" href="../css/footer.css" type="text/css">
  <link rel="stylesheet" href="../css/imageSingInUp.css" type="text/css">
  <link rel="stylesheet" href="../css/lettering.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
  <!-- button -->
  <link rel="stylesheet" href="../css/button.css" type="text/css">
  <!-- box -->
  <link rel="stylesheet" href="../css/box.css" type="text/css">
</head>

<body>
  <?php
  include_once('templates/header.php');
  ?>
  <div class="pageContent">
    <div id="error">
      <?php
      $invalid_user = $_SESSION['invalid_user'];
      if($invalid_user) {
        echo '<div id="singUpError">
        <span>Invalid username</span>
        </div>';
}
      ?>
    </div>
    <div id="logoImage">
      <img src="../images/logo.png" alt="logo" height="200px">
    </div>
    <div id="userNameSU">
      <form action="actions/signup.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="token" value=<?php echo $_SESSION['token'];?>>
        <label>
          Username
          <br>
          <input id="username" class="box" type="text" name="username" required><br>
          <p id="invalidUsername" style="display:none;">Write a valid username, 8 characters<br></p>
          <br>
        </label>
        <label>
          <br>
          Password
          <br>
          <input id="password" class="box" type="password" name="password" required><br>
          <p id="invalidPassword" style="display:none;">Write a valid password, 8 characters<br></p>
          <br>
        </label>
        <label>
          <br>
          Confirm Password
          <br>
          <input id="confirmPassword" class="box" type="password" name="confirmPassword" required><br>
          <p id="checkingPasswords" style="display:none;">The passwords doesn't match<br></p>
          <br>
        </label>
        <label>
          <br>
          Name
          <br>
          <input id="name" class="box" type="text" name="name" required><br>
          <br>
        </label>
        <label>
          <br>
          Email
          <br>
          <input  id="email" class="box" type="e-mail" name="email" required><br>
          <br>
        </label>
        <label>
          <br>
          Gender
          <select id="gender" class="box" name="gender">
              <option value="male">Male</option>
              <option value="Female">Female</option>
          </select>
          <br>
        </label>
        <br>
        <br>
          <input id="buttonCreateAccount" class="buttonStyle" type="submit" value="Create Account" >
      </form>
  </div>
  <div id="mainPageSU">
      <form action="mainPage.php" method="post">
          <input class="buttonStyle" type="submit" value="Back to main Page">
      </form>
  </div>
</div>
<?php
include_once('templates/footer.php');
?>
</html>
