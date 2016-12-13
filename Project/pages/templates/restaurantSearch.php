<link rel="stylesheet" href="../css/lettering.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
<link rel="stylesheet" href="../css/imageMainPage.css" type="text/css">
<link rel="stylesheet" href="../css/restaurantSearch.css" type="text/css">

<div class="pageContent">
    <div id="searchRestaurants">
        <?php
        if(isset($_SESSION['noResultsFound']) && $_SESSION['noResultsFound']==1) {
            echo '<div id="searchError">No results found...</div>';
            echo '<form action="mainPage.php" method="post">';
            echo '<input class="buttonStyle" type="submit" value="Back to main Page">';
            echo '</form>';
        }
        else {
            echo '<div id="msgResults">Results Found</div>';

            if(count($_SESSION['search'])){
                echo '<div class="resultsList"><ul>';
                foreach ($_SESSION['search'] as $item) {
                    if(!is_null($item['id'])){
                        echo '<a href="'.$link.'" >';
                        echo '<div class="restaurantInfo">';
                        $link = "actions/restaurant.php?id=".$item['id'];
                        echo '<img id="restaurantIMG" src="../images/icons/noImgRestaurant.png" alt="Restaurant Image" height="100px">';
                        echo '<div class="restaurantSearchInfo">';
                        //echo '<a href="'.$link.'" >'.$item['name'].'</a>';
                        echo '<div class="restaurantNameInfo">'.$item['name'].'</div>';
                        echo '<div class="restaurantLocationInfo">'.$item['location'].'</div>';
                        echo '<div class="restaurantPriceInfo">'.$item['price'].' €</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
                echo '</ul></div>';
            }
        }
        ?>
    </div>
</div>
