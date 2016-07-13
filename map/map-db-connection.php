<?php

include ("w000_dbname.inc");
//$database = "ORATST";
$connection =	OCILogon("a932", $password, $database);

$sql = "select T170_ID, T170_BLDG_NAME
								FROM A932T170
								WHERE T170_DISPLAY = 'Y'
								AND T170_TYPE = 'bldg'
								ORDER BY T170_BLDG_NAME";

$stmt = OCIParse($connection, $sql);

if (OCIExecute($stmt)) {
    while (OCIFetch($stmt)){
        $bldg_list .= "<li><a href=\"javascript:scrollToMarker('".OCIResult($stmt,"T170_ID")."')\")>".OCIResult($stmt,"T170_BLDG_NAME")."</a></li>";
    }
}
ocifreestatement($stmt);

$sql = "select T170_ID, T170_BLDG_NAME
								FROM A932T170
								WHERE T170_DISPLAY = 'Y'
								AND T170_TYPE = 'pkng'
								ORDER BY T170_BLDG_NAME";

$stmt = OCIParse($connection, $sql);

if (OCIExecute($stmt)) {
    while (OCIFetch($stmt)){
        $pkng_list .= "<li><a href=\"javascript:scrollToMarker('".OCIResult($stmt,"T170_ID")."')\")>".OCIResult($stmt,"T170_BLDG_NAME")."</a></li>";
    }
}
ocifreestatement($stmt);

$sql = "select T170_ID, T170_BLDG_NAME
								FROM A932T170
								WHERE T170_DISPLAY = 'Y'
								AND T170_TYPE = 'labs'
								ORDER BY T170_BLDG_NAME";

$stmt = OCIParse($connection, $sql);

if (OCIExecute($stmt)) {
    while (OCIFetch($stmt)){
        $labs_list .= "<li><a href=\"javascript:scrollToMarker('".OCIResult($stmt,"T170_ID")."')\")>".OCIResult($stmt,"T170_BLDG_NAME")."</a></li>";
    }
}
ocifreestatement($stmt);
