<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta charset="utf-8">
    <!-- letra -->
    <link rel="stylesheet" href="../css/lettering.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
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
                if(!is_null($item['id'])){
                    $link = "actions/restaurant.php?id=".$item['id'];
                     echo '<li><a style="text-decoration:none;"href="'.$link.'" ><span style="color:#000000;">
                    ' .$item['name'].'<br><br>
                    </span></li>';
                }
            }
            echo '</ul></div>';
        }

    }
    ?>
</div>
</body>
</html>
</DOCTYPE>
