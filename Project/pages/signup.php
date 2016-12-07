<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/js/sign_up.js"></script>
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/signup.css" type="text/css">
    <link rel="stylesheet" href="../css/footer.css" type="text/css">
    <!-- definições pagina -->
    <link rel="stylesheet" href="../css/globalContent.css" type="text/css">
    <!-- letra -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
</head>
<body>
<div class="pageContent">
  <div>
      <?php
      $invalid_user = $_SESSION['invalid_user'];
          if($invalid_user) {
    echo '<p>Invalid username</p>';
  }
      ?>
  </div>
  <div id="logoImage">
    <img src="../images/logo.png" alt="logo" height="200px">
  </div>
  <div id="userNameSU">
      <form action="actions/signup.php" method="post" onsubmit="return validateForm()">
          <label>
            Username
            <br>
          <input id="username" type="text" name="username" required><br>
          <p id="invalidUsername" style="display:none;">Write a valid username, 8 characters<br></p>
          <br>
        </label>
        <label>
          <br>
          Password
          <br>
          <input id="password" type="password" name="password" required><br>
          <p id="invalidPassword" style="display:none;">Write a valid password, 8 characters<br></p>
          <br>
        </label>
        <label>
          <br>
          Confirm Password
          <br>
          <input id="confirmPassword" type="password" name="confirmPassword" required><br>
          <p id="checkingPasswords" style="display:none;">The passwords doesn't match<br></p>
          <br>
        </label>
        <label>
          <br>
          Name
          <br>
          <input id="name" type="text" name="name" required><br>
          <br>
        </label>
        <label>
          <br>
          Email
          <br>
          <input  id="email" type="e-mail" name="email" required><br>
          <br>
        </label>
        <label>
          <br>
          Gender
          <br>
          <select name="gender">
              <option value="male">Male</option>
              <option value="Female">Female</option>
          </select>
          <br>
        </label>
        <br>
        <br>
          <input type="submit" value="Create Account">
      </form>
  </div>
  <div id="mainPageSU">
      <form action="mainPage.php" method="post">
          <input type="submit" value="Back to main Page">
      </form>
  </div>
</div>
<?php
include_once('templates/footer.php');
?>
</html>
