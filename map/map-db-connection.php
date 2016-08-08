<?php

include ("w000_dbname.inc");
//$database = "ORATST";
$connection =	oci_connect("a932", $password, $database);

$sql = "select T170_ID, T170_BLDG_NAME
								FROM A932T170
								WHERE T170_DISPLAY = 'Y'
								AND T170_TYPE = 'bldg'
								ORDER BY T170_BLDG_NAME";

$stmt = oci_parse($connection, $sql);

if (oci_execute($stmt)) {
    while (oci_fetch($stmt)){
        $bldg_list .= "<li><a href=\"javascript:scrollToMarker('".OCIResult($stmt,"T170_ID")."')\")>".OCIResult($stmt,"T170_BLDG_NAME")."</a></li>";
    }
}
oci_free_statement($stmt);

$sql = "select T170_ID, T170_BLDG_NAME
								FROM A932T170
								WHERE T170_DISPLAY = 'Y'
								AND T170_TYPE = 'pkng'
								ORDER BY T170_BLDG_NAME";

$stmt = oci_parse($connection, $sql);

if (oci_execute($stmt)) {
    while (oci_fetch($stmt)){
        $pkng_list .= "<li><a href=\"javascript:scrollToMarker('".OCIResult($stmt,"T170_ID")."')\")>".OCIResult($stmt,"T170_BLDG_NAME")."</a></li>";
    }
}
oci_free_statement($stmt);

$sql = "select T170_ID, T170_BLDG_NAME
								FROM A932T170
								WHERE T170_DISPLAY = 'Y'
								AND T170_TYPE = 'labs'
								ORDER BY T170_BLDG_NAME";

$stmt = oci_parse($connection, $sql);

if (oci_execute($stmt)) {
    while (oci_fetch($stmt)){
        $labs_list .= "<li><a href=\"javascript:scrollToMarker('".OCIResult($stmt,"T170_ID")."')\")>".OCIResult($stmt,"T170_BLDG_NAME")."</a></li>";
    }
}
oci_free_statement($stmt);

$sql = "select T170_ID, T170_BLDG_NAME, T170_BLDG_NAME2, T170_ANALYTICS, T170_LINK, T170_LATITUDE, T170_LONGITUDE, T170_ADDRESS, T170_CITY, T170_STATE, T170_ZIP, T170_THUMBNAIL, T170_DESCRIPTION, T170_TYPE, T170_TAGS, T170_IMAGE
								FROM A932T170
								WHERE T170_DISPLAY = 'Y'";

$stmt = oci_parse($connection, $sql);

if (oci_execute($stmt)) {
    while (oci_fetch($stmt)){
        $locations .= '{"name":	"'.oci_result($stmt,"T170_BLDG_NAME").'", "analytics_name": "'.oci_result($stmt,"T170_ANALYTICS").'", "name2": "'.oci_result($stmt,"T170_BLDG_NAME2").'", "link": "'.oci_result($stmt,"T170_LINK").'", "location": ['.oci_result($stmt,"T170_LATITUDE").', '.oci_result($stmt,"T170_LONGITUDE").'], "display_address": "'.oci_result($stmt,"T170_ADDRESS").'<br />'.oci_result($stmt,"T170_CITY").', '.oci_result($stmt,"T170_STATE").' '.oci_result($stmt,"T170_ZIP").'", "address": "'.oci_result($stmt,"T170_ADDRESS").'", "address_maps": "'.oci_result($stmt,"T170_ADDRESS").' '.oci_result($stmt,"T170_CITY").', '.oci_result($stmt,"T170_STATE").' '.oci_result($stmt,"T170_ZIP").' ['.oci_result($stmt,"T170_LATITUDE").', '.oci_result($stmt,"T170_LONGITUDE").']", "thumb": "'.oci_result($stmt,"T170_THUMBNAIL").'", "thumb_using_id": "'.oci_result($stmt,"T170_ID").'", "image": '.oci_result($stmt,"T170_IMAGE").', "description": "'.oci_result($stmt,"T170_DESCRIPTION").'", "type": "'.oci_result($stmt,"T170_TYPE").'", "id": "'.oci_result($stmt,"T170_ID").'", "tags": "'.oci_result($stmt,"T170_TAGS").'"},';
    }
}
oci_free_statement($stmt);

$locations = substr($locations,0,-1);
