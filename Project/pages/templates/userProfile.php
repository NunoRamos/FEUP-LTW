<link rel="stylesheet" href="../css/userProfile.css" type="text/css">
<link rel="stylesheet" href="../css/button.css" type="text/css">

<div id="userEditMainDiv">
    <form id="editUserForm">
        <h2 style="margin-top: 2em;">Edit Page!</h2>

        <p id="editUserName"><?php echo $_SESSION['userInfo']['username']; ?></p>

        <input id="editUserEmail" type="text" name="newEmail" value="<?php echo $_SESSION['userInfo']['email']; ?> ">

        <input id="editUserFullName" type="text" name="newFullName" value="<?php echo $_SESSION['userInfo']['name']; ?>">

        <input id="editSubmitButton" class="buttonStyle" type="submit" value="Edit restaurant">
    </form>

    <div id="photoContainer">
        <img id="editUserImage" src="../images/user/default-user.png" alt="Restaurant Image">
        <input id="editSubmitButton" class="buttonStyle" type="submit" value="Upload Photo">
    </div>

</div>