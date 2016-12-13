<?php

include_once('utils/utils.php');

$_SESSION['token'] = generateRandomToken();

?>

<link rel="stylesheet" href="../css/mainPage.css" type="text/css">
<link rel="stylesheet" href="../css/imageMainPage.css" type="text/css">
<link rel="stylesheet" href="../css/box.css" type="text/css">
<!-- button -->
<link rel="stylesheet" href="../css/button.css" type="text/css">
<!-- bOX -->
<link rel="stylesheet" href="../css/box.css" type="text/css">
<!-- letra -->
<link rel="stylesheet" href="../css/lettering.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
<!--  -->
<div class="pageContent">
    <img id="logo" src="../images/logo.png" alt="logo">
    <form id="searchBox" action="actions/restaurantSearch.php" method="get">
        <input type="hidden" name="token" value=<?php echo $_SESSION['token']; ?>>
        <select class="box" name="searchBy">
            <option value="name">Name</option>
            <option value="location">Location</option>
            <option value="price">Max Price</option>
        </select>
        <input id="searchBoxStyle" class="box" type="text" name="search" placeholder="Search Restaurants">
        <input id="searchBoxSubmit" class="buttonStyle" type="submit" value="Search">
    </form>
    <div id="iconsTypes">

        <?php
        $link = 'actions/restaurantSearch.php?search=Café&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconPequenoAlmoco"  title="Café" src="../images/icons/pequenoAlmoco.png" alt="Pequeno Almoço" height="100px">';
        echo '</a>';
        ?>

        <?php
        $link = 'actions/restaurantSearch.php?search=Italian&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconAlmoco" title="Italian" src="../images/icons/almoco.png" alt="Almoço" height="100px">';
        echo '</a>';
        ?>

        <?php
        $link = 'actions/restaurantSearch.php?search=Barbecue&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconJantar" title="Barbacue" src="../images/icons/jantar.png" alt="Jantar" height="100px">';
        echo '</a>';
        ?>

        <?php
        $link = 'actions/restaurantSearch.php?search=Francesinha&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconLoaf" title="Francesinha" src="../images/icons/loaf.png" alt="Francesinha" height="100px">';
        echo '</a>';
        ?>

        <?php
        $link = 'actions/restaurantSearch.php?search=Pub&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconBeberUmCopo" title="Pub" src="../images/icons/beberUmCopo.png" alt="Beber Um Copo" height="100px">';
        echo '</a>';
        ?>

        <?php
        $link = 'actions/restaurantSearch.php?search=Lunch&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconCafesEPastelarias" title="Coffee and Cakes" src="../images/icons/cafesEPastelarias.png" alt="Cafés E Pastelarias" height="100px">';
        echo '</a>';
        ?>

        <?php
        $link = 'actions/restaurantSearch.php?search=TakeAway&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconTakeAway" title="Takeaway" src="../images/icons/takeAway.png" alt="Take Away" height="100px">';
        echo '</a>';
        ?>

        <?php
        $link = 'actions/restaurantSearch.php?search=Gourmet&searchBy=type&token='.$_SESSION['token'];
        echo '<a href='.$link.' >';
        echo '<img id="iconRefeicoesDeLuxo" title="Gourmet"src="../images/icons/refeicoesDeLuxo.png" alt="Refeições De Luxo" height="100px">';
        echo '</a>';
        ?>

    </div>
</div>
</div>
