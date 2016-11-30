<?php
include_once('../../database/dbUtils.php');

session_start();

$_SESSION['noResultsFound']=0;
$search = $_POST["search"];
$result_names = getRestaurantsNames();
$number_of_rows = sizeof($result_names);
$array= array();

for($i = 0; $i < $number_of_rows;$i++) {

    similar_text(strtoupper($search), strtoupper($result_names[$i]['name']), $percent);
    if ($percent > 35) {
        $array[] = $result_names[$i]['name'];
    }
}

$result_types = getRestaurantsTypes();
$number_of_rows = sizeof($result_types);

for($i = 0; $i < $number_of_rows;$i++) {
    similar_text(strtoupper($search), strtoupper($result_types[$i]['type']), $percent);
    if ($percent > 85) {
        $array[] = $result_names[$i]['name'];
    }

}

$searches= array_unique($array);

if(sizeof($searches) !=0){
    $_SESSION['search'] = $searches;
    $_SESSION['noResultsFound'] = 0;
    header('Location: ../restaurantSearch.php');
}
else{
    $_SESSION['noResultsFound'] = 1;
    header('Location: ../restaurantSearch.php');
}
