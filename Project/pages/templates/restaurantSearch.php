<link rel="stylesheet" href="../css/lettering.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
<link rel="stylesheet" href="../css/imageMainPage.css" type="text/css">
<link rel="stylesheet" href="../css/restaurantSearch.css" type="text/css">

<div class="pageContent">
  <div id="searchRestaurants">
    <?php
    if(isset($_SESSION['noResultsFound']) && $_SESSION['noResultsFound']==1) {
  echo '<div id="searchError">
        <span>No results found...</span>
        </div>';
}

else {
  echo '<div id="msgResults">
        <span>Results Found</span>
        </div>';

        if(count($_SESSION['search'])){
            echo '<div class="resultsList"><ul>';
            foreach ($_SESSION['search'] as $item) {
                if(!is_null($item['id'])){
                  echo '<div class="restaurantInfo">';
                    $link = "actions/restaurant.php?id=".$item['id'];
                    echo '<li>
                    <img id="restaurantIMG" src="../images/icons/noImgRestaurant.png" alt="Restaurant Image" height="100px">
                    <a href="'.$link.'" ><span>';
                    echo $item['name'];
                    echo '</span></li>';
                    echo '</div>';
}
            }

echo '</ul></div>';
}
    }
    ?>
  </div>
</div>
