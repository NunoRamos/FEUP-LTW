<link rel="stylesheet" href="../css/lettering.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
<div>
    <?php
    if(isset($_SESSION['noResultsFound']) && $_SESSION['noResultsFound']==1){
        echo '<div>';
        echo '<span style="color:#FF0000;">';
        echo 'No results found...</span>';
        echo '</div>';
    }
    else {
        echo '<div>';
        echo '<span style="color:#FF0000;">';
        echo 'Results found...</span>';
        echo '</div>';

        if(count($_SESSION['search'])){
            echo '<div><ul>';
            foreach ($_SESSION['search'] as $item) {
                if(!is_null($item['id'])){
                    $link = "actions/restaurant.php?id=".$item['id'];
                    echo '<li><a style="text-decoration:none;"href="'.$link.'" ><span style="color:#000000;">';
                    echo $item['name'];
                    echo '</span></li>';
                }
            }
            echo '</ul></div>';
        }

    }
    ?>
</div>