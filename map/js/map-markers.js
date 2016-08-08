/* <![CDATA[ */

var map;
var locationsMarkers = [];
var parkingMarkers = [];
var locationsList = [];
var mapURL = window.location.href.split('?')[0];

function setMarkers(map, locations) {
    for (var i = 0; i < locations.length; i++) {
    // Set up HTML for InfoWindow
    var name = '';
    var name2 = '';
    var address = '';

    var fullName = locations[i].name;
    //if (locations[i].name2) { fullName = fullName + ' (' + locations[i].name2 + ')'};

    // Replace all spaces and slashes with an underscore
    var uid = fullName.replace(/[ \/]/g, '_');
    // Remove anything that's not an alphanumeric character, underscore, or dash
    uid = uid.replace(/[^a-zA-Z0-9_-]/g, '');

    var uid = locations[i].id;
    var imageUrl = '';
    var desc = '';
    var permalink = '<span title="Copy direct link to location" aria-label="Copy direct link to location" class="fa fa-link uthsc-map-link" id="' +
        uid + '" ></span> ';
    if (locations[i].name) {
    name = '<h5>' + permalink + locations[i].name + '</h5><p>'
}
    ;
    if (locations[i].type == "pkng") {
    name = name + locations[i].description
}
    ;
    if (locations[i].type == "labs") {
    name = name + locations[i].description
}
    ;
    if (locations[i].type == "bldg") {
    name = name + locations[i].display_address
}
    ;
    if (locations[i].thumb_using_id) {
    imageUrl =
    '<img ' +
    'class="uthsc-map-pop-up-image"' +
    'src="/map/images/buildings/thumbs/' + locations[i].thumb_using_id + '.jpg"' +
    ' />'
}
    ;
    if (locations[i].description) {
    desc = '<p class="description">' + locations[i].description + '</p>'
}
    ;
    address = '<div id="directions_container">' +
    '<p>Directions:&emsp;' +
    '<a href="#" ' +
    'id="to_here_link" ' +
    'onclick="_gaq.push([' +
    '"_trackEvent", ' +
    '"Map", ' +
    '"Info Window", "To - ' + locations[i].analytics_name + '"' +
    ']);' +
    '">To here</a>&emsp;|&emsp;' +
    '<a href="#" id="from_here_link" ' +
    'onclick="_gaq.push([' +
    '"_trackEvent", ' +
    '"Map", ' +
    '"Info Window", "From - ' + locations[i].analytics_name + '"' +
    ']);' +
    '">From here</a>' +
    '</p>' +
    '<div id="directions_form">' +
    '<form ' +
    'action="https://maps.google.com/maps" ' +
    'method="get">' +
    '<input ' +
    'id="hidden_dir" ' +
    'type="hidden" ' +
    'name="daddr" ' +
    'value="' + locations[i].location + '">' +
    '<input ' +
    'id="visible_dir" ' +
    'type="text" ' +
    'placeholder="Start address" ' +
    'name="saddr">' +
    '<input ' +
    'class="submit" ' +
    'type="submit" ' +
    'value="GO" ' +
    'onclick="_gaq.push([' +
    '"_trackEvent", ' +
    '"Map", ' +
    '"Info Window", ' +
    '"DirGo - ' + locations[i].analytics_name + '"' +
    ']);">' +
    '</form>' +
    '</div>' +
    '</div>';
    // Create Locations Markers

    locationsMarkers[i] = new google.maps.Marker({
    title: locations[i].name,
    position: new google.maps.LatLng(locations[i].location[0], locations[i].location[1]),
    clickable: true,
    draggable: false,
    map: map,
    html: '<div style="width:326px;">' +
    '<div id="bodyContent">' + imageUrl +
    name + address + '' +
    '</div>' +
    '</div>',
    icon: new google.maps.MarkerImage(
    '//www.uthsc.edu/map/images/' + locations[i].type + '.png',
    new google.maps.Size(16, 28),
    new google.maps.Point(0, 0),
    new google.maps.Point(6, 20)
    ),
    fullName: fullName,
    id: uid
});
    // Set up Click Event on Markers
    google.maps.event.addListener(locationsMarkers[i], "click", function () {
    map.panTo(this.position);
    details.setContent(this.html);
    details.open(map, this);
});
    // Create sidebar lists and append in sidebar
    var list = locations[i].type;
    var tags = '';
    if (locations[i].tags) {
    tags = '<!-- ' + locations[i].tags + '-->'
}
    ;
    var li = jQuery(
    '<li>' +
    '<a href="javascript:scrollToMarker(\'' + locationsMarkers[i].id + '\')">' +
    locationsMarkers[i].fullName + tags +
    '</a>' +
    '</li>'
    );
    jQuery('h6.' + list).next('div').children('ul').append(li);

    //Use to get precise coordinates when draggable = true
    //google.maps.event.addListener(locationsMarkers[i], "dragend", function () {
    //	console.log(this.getPosition().toUrlValue());
    //});
}
}

function getCenter(location) {
    for (var i = 0; i < locationsMarkers.length; i++) {
        if (locationsMarkers[i].id == location) {
            var center = locationsMarkers[i].position;
            return center;
        } else {
            var center = new google.maps.LatLng(35.139416, -90.034815);
        }
    }
    return center;
}

function scrollToMarker(location) {
    for (var i = 0; i < locationsMarkers.length; i++) {
    if (locationsMarkers[i].id == location) {
    map.panTo(locationsMarkers[i].position);
    details.setContent(locationsMarkers[i].html);
    details.open(map, locationsMarkers[i]);
    if (locationsMarkers[i].getMap() == null) {
    toggleLocations(locations[i].type);
    $("." + locations[i].type + " a.button").toggleClass("markers_off");
}
    //Shadowbox.setup('a.shadowbox');
}
}
}

function toggleLocations(which) {
    jQuery('.check.' + which).toggleClass("unchecked");
    for (var i = 0; i < locationsMarkers.length; i++) {
    var type = locations[i].type;
    if (which == type) {
    if (locationsMarkers[i].getMap() != null) {
    locationsMarkers[i].setMap(null);
} else {
    locationsMarkers[i].setMap(map);
}
}
}
}
var map = null;
function initialize() {
    // Initialize new google map
    var mapOptions = {
        center: new google.maps.LatLng(35.139416,-90.034815),
        zoom: 17, //campus
        mapTypeId: google.maps.MapTypeId.ROADMAP
};
    map = new google.maps.Map(document.getElementById("uthsc-map-canvas"),
    mapOptions);
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-state'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.7469228,-90.470092));
        map.setZoom(7);
        map.setMapTypeId(google.maps.MapTypeId.HYBRID);
    });
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-city'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.1288636,-90.0408609));
        map.setZoom(12);
        map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
    });
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-campus'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.139416,-90.034815));
        map.setZoom(17);
        map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

    });
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-3d'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.139416,-90.034815));
        map.setZoom(18);
        map.setMapTypeId(google.maps.MapTypeId.HYBRID);
        map.setTilt(45);
    });
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-state-mobile'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.360074,-86.2664699));
        map.setZoom(6);
        map.setMapTypeId(google.maps.MapTypeId.HYBRID);
    });
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-city-mobile'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.1288636,-89.9608609));
        map.setZoom(11);
        map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
    });
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-campus-mobile'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.139416,-90.034815));
        map.setZoom(16);
        map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

    });
    google.maps.event.addDomListener(document.getElementById('uthsc-map-zoom-3d-mobile'), 'click', function () {

        map.setCenter(new google.maps.LatLng(35.138721,-90.032719));
        map.setZoom(19);
        map.setMapTypeId(google.maps.MapTypeId.HYBRID);
        map.setTilt(45);
    });
    // Set location markers
    setMarkers(map, locations);
    toggleLocations('labs');

    if (navigator.geolocation) {
    var meMarker = null;
    navigator.geolocation.watchPosition(function (position) {
    var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    if (meMarker == null) {
    meMarker = new google.maps.Marker({
    position: myLatlng,
    map: map
});
    meMarker.setMap(map);
} else {
    meMarker.setPosition(myLatlng);
}
});
} else {
    error('Geo Location is not supported');
}


    // Set default infowindow content
    details = new google.maps.InfoWindow({
    content: "loading...",
    // And max-width
    maxWidth: 350
});
    // Open InfoWindow from URL
    var locationID = "";
    scrollToMarker(locationID);
    // Close infowindows when map clicked
    google.maps.event.addListener(map, "click", function () {
    if (details) {
    details.close();
}
});

    jQuery(".buildings").click(function (evt) {
    // Set up locations check marks
    // Prevent check marks from activating accordion
    evt.stopPropagation();
    // Get first class name of check mark
    var which = jQuery(this).attr('class').split(' ')[0];
    // Toggle location markers based on check mark class name
    toggleLocations(which);
});
    // Set up parking check marks
    jQuery("ul.parking .check").click(function (evt) {
    // Prevent check marks from activating accordion
    evt.stopPropagation();
    // Get first class name of check mark
    var which = jQuery(this).attr('class').split(' ')[0];
    // Toggle parking markers based on check mark class name
    toggleParking(which);
});
}

//====================================================
google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addDomListener(window, "resize", function () {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);
});


//====================================================


$(document).on("click", ".uthsc-map-link", function () {
    var uid = $(this).attr("id");
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val("https://uthsc.edu/map/?" + uid).select();
    document.execCommand("copy");
    $temp.remove();
});
/* ]]> */