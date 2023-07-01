<?php
//list of states you want to cover.
$states_needed = array("mt", "wa", "or", "id", "nv", "ut", "ca", "az");
$states_needed = array_unique($states_needed);


//list of stations and the states they cover.
$stations = array();
$stations["kone"] = array("id", "nv", "ut");
$stations["ktwo"] = array("wa", "id", "mt");
$stations["kthree"] = array("or", "nv", "ca");
$stations["kfour"] = array("nv", "ut");
$stations["kfive"] = array("ca", "az");


$final_stations = array(); //Will hold the final list of stations
while (!empty($states_needed)) {
    $best_station = null;
    $states_covered = array();

    foreach ($stations as $station => $states) {
        $covered = array_intersect($states_needed, $states);
        if (count($covered) > count($states_covered)) {
            $best_station = $station;
            $states_covered = $covered;
        }
    }

    $states_needed = array_diff($states_needed, $states_covered);
    $final_stations[] = $best_station;
}

print_r($final_stations);

?>



/* 
|
|
|    <--- ARRAY METHODS ---
|
|The 'array_intersect()' function is a built-in PHP function that takes two or more arrays and
|returns an array containing all the values that are present in all the input arrays.
|
|
|The 'array_diff()' function is a built-in PHP function that compares two or more arrays and
|returns an array containing all the values from the first array  that are not present
|in any of the other arrays.
|
|
|
|
*/