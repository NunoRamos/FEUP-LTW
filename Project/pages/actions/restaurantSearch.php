<?php
include_once('../../database/dbUtils.php');

session_start();

$token = $_GET['token'];
if($_SESSION['token'] != $token){
    header('Location: ../templates/niceTry.html');
}

$_SESSION['noResultsFound']=0;

$search = htmlspecialchars($_GET["search"]);
$searchBy = htmlspecialchars($_GET["searchBy"]);

/*
$number_of_rows = sizeof($result_names);
$array= array();

for($i = 0; $i < $number_of_rows;$i++) {

    similar_text(strtoupper($search), strtoupper($result_names[$i]['name']), $percent);
    if ($percent > 35) {
        $array[] = $result_names[$i]['id'];
    }
}

$result_types = getRestaurantsTypes();
$number_of_rows = sizeof($result_types);

for($i = 0; $i < $number_of_rows;$i++) {
    similar_text(strtoupper($search), strtoupper($result_types[$i]['type']), $percent);
    if ($percent > 85) {
        $array[] = $result_types[$i]['id'];
    }

}

$idSearches= array_unique($array);
$searches = array();
*/
if($searchBy == "name") {
    $results = getRestaurantByName2($search);
}
else if($searchBy == "location"){
    $results = getRestaurantByLocation($search);
}
else if($searchBy == "price"){
    $results = getRestaurantByMaxPrice($search);
}
else if($searchBy == "type"){
    $results = getRestaurantByType($search);
}

$number_of_rows = sizeof($results);

for($i = 0; $i < $number_of_rows;$i++) {
   /* $id = $idSearches[$i];
    $names = getRestaurant($id);
    $searches[$i]['id'] = $id;
    $searches[$i]['name'] = $names[0]['name'];*/
   /* $searches[$i]['id'] = $results[$i]['id'];
    $searches[$i]['name'] = $results[$i]['name'];*/
   $searches[$i] = $results[$i];
}

if(sizeof($searches) !=0){
    unset($_SESSION['search']);
    $_SESSION['search'] = $searches;
    $_SESSION['noResultsFound'] = 0;
    header('Location: ../restaurantSearch.php');
}
else{
    $_SESSION['noResultsFound'] = 1;
    header('Location: ../restaurantSearch.php');
}
