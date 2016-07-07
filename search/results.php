<?php

//$people_search = array(
//    'meta' => array(
//
//    ),
//    'campus' => array(
//        'gspake1' => array(
//            'id' => 'T100345345',
//            'name' => 'Spake, George P',
//            'phone' => '(901) 448-1888',
//            'dept' => 'Web Services'
//        ),
//        'jsmith47' => array(
//            'id' => 'T200378678',
//            'name' => 'Smith, John A',
//            'phone' => '(901) 448-8743',
//            'dept' => 'Unknown Inc.'
//        )
//
//    ),
//    'system' => array(
//        'nwinn1' => array(
//            'id' => 'T200378678',
//            'name' => 'Winn, Nic',
//            'phone' => '(901) 448-1777',
//            'dept' => 'ITS Web Services'
//        ),
//        'alincoln' => array(
//            'id' => 'T200378678',
//            'name' => 'Lincoln, Abe',
//            'phone' => '(901) 448-1543',
//            'dept' => 'Office of the President'
//        )
//    )
//);

function curl_people_search_results($url) {
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);

    return $result;
}

$people_search = curl_people_search_results('https://uthsc.edu/search/scripts/lookup.php?' . $_SERVER["QUERY_STRING"] );