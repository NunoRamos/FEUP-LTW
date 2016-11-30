<?php
include_once('../../database/dbUtils.php');

$search = $_POST["search"];

$result_names = getRestaurantsNames();
$number_of_rows = sizeof($result_names);
$array= array();

for($i = 0; $i < $number_of_rows;$i++) {

    similar_text(strtoupper($search), strtoupper($result_names[$i]['name']), $percent);
    if ($percent > 40) {
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
print_r($searches);

//similar_text($search, $result)
//echo $number_of_rows;

   /* if($number_of_rows != 0){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['incorrectLogin_flag']=0;
    header('Location: ../index.php');
}
else {
    $_SESSION['incorrectLogin_flag']=1;
}
header('Location: ../restaurantSearch.php');*/
