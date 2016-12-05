<link rel="stylesheet" href="../css/mainPage.css" type="text/css">
<div class="relative">
    <h4 id="mainPageTitle">The best restaurant website!!</h4>
</div>
<?php
    echo '<div id="searchBox">
            <form action="actions/restaurantSearch.php" method="post">
            <input id="searchBoxStyle" required type="text" name="Search" placeholder="Search Restaurants">
            <input id="searchBoxSubmit" type="submit" value="search">
            </form>
          </div>';
?>
