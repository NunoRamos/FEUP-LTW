<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta charset="utf-8">
</head>
<body>
<div>
    <?php
    if(isset($_SESSION['noResultsFound']) && $_SESSION['noResultsFound']==1){
        echo '<div>
            <span style="color:#FF0000;">
            No results found...</span>
            </div>';
    }
    else
    {
        echo '<div>
            <span style="color:#FF0000;">
            Results found... <br><br><br></span>
            </div>';

        if(count($_SESSION['search'])){
            echo '<div><ul>';
            foreach ($_SESSION['search'] as $item) {
                $link = "actions/restaurant.php?id=".$item['id']  ;
                echo '<a style="text-decoration:none;"href="'.$link.'" ><span style="color:#000000;">
                   ' .$item['name'].'<br><br>
                 </span>';
            }
            echo '</ul></div>';
        }

    }
    ?>
</div>
</body>
</html>
</DOCTYPE>