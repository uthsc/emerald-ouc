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
?>
<ul class="button-group [radius round]">
    <li>
        <div class="bldg"><a href="#" class="button split tiny map_markers"><img src="images/bldg.png" alt="Building Marker" width="16" height="24" />&emsp;Buildings <span id="bldg_dropdown" data-dropdown="drop_bldg"> </span></a><br></div>
        <ul id="drop_bldg" class="f-dropdown" data-dropdown-content>
            <?php echo $bldg_list; ?>
        </ul>
    </li>
    <li>
        <div class="pkng"><a href="#" class="button split tiny map_markers"><img src="images/pkng.png" alt="Parking Marker" width="16" height="24" />&emsp;Parking <span id="pkng_dropdown" data-dropdown="drop_pkng"></span></a><br></div>
        <ul id="drop_pkng" class="f-dropdown" data-dropdown-content>
            <?php echo $pkng_list; ?>
        </ul>
    </li>
    <li>
        <div class="labs"><a href="#" class="button split tiny map_markers markers_off"><img src="images/labs.png" alt="Student Computer Labs Marker" width="16" height="24" />&emsp;Student Computer Labs <span id="labs_dropdown"  class="drop_downs" data-dropdown="drop_labs"></span></a><br></div>
        <ul id="drop_labs" class="f-dropdown no_scroll" data-dropdown-content>
            <?php echo $labs_list; ?>
        </ul>
    </li>
    <li style="float: right; margin:0 20px 0 0 !important;" title="Printable Map (PDF)">
        <button style="margin:0;" href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button tiny dropdown map_markers markers_off"><img src="/map/images/icons/printer_white.png" alt="Print icon" width="24" height="24" />&emsp;Printable Maps (PDF) </button><br>
        <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
            <li><a href="sitemap/campusmap.pdf">Memphis</a></li>
            <li><a href="http://gsm.utmck.edu/about/documents/utmc_campus_map2014.pdf">Knoxville</a></li>
            <li><a href="sitemap/chattanooga-map.pdf">Chattanooga</a></li>
        </ul>
    </li>
</ul>
<noscript>
    <p><strong>JavaScript must be enabled in order for you to use Google Maps.</strong> However, it seems JavaScript is either disabled or not supported by your browser. To view Google Maps, enable JavaScript by changing your browser options, and then try again.</p>
</noscript>

<?php include("js/toggle.js"); ?>

<div id="map_canvas" style="width:100%;height:100%;"></div>

<script>

    $(document).foundation();
    /*
     $("#drop_bldg").on("opened", function(){
     //toggleLocations('bldg');
     });
     $("#drop_bldg").on("closed", function(){
     //alert("closed");
     //toggleLocations('bldg');
     });

     $("#drop_pkng").on("opened", function(){
     toggleLocations('pkng');
     });
     $("#drop_pkng").on("closed", function(){
     toggleLocations('pkng');
     });

     $("#drop_labs").on("opened", function(){
     toggleLocations('labs');
     });
     $("#drop_labs").on("closed", function(){
     toggleLocations('labs');
     });
     */
    $('.f-dropdown').click(function() {
        if ($(this).hasClass('open')) {
            $('span[data-dropdown="'+$(this).attr('id')+'"]').trigger('click');
            //alert("close");
        }
    });

</script>

