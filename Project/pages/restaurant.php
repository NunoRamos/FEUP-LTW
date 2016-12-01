<?php
session_start();

include_once('templates/header.php');
?>

<div>
    <h2><?php echo $_SESSION['restaurant']['name']; ?></h2>
    <h4>
        <?php echo $_SESSION['restaurant']['type']; ?>
        | <?php echo $_SESSION['restaurant']['location']; ?>
    </h4>
</div>

<?php include_once('templates/footer.php'); ?>