$( ".button" ).click(function() {
    $( this ).toggleClass( "markers_off" );
});

$( ".pkng" ).click(function() {
    toggleLocations('pkng');
});
$( ".bldg" ).click(function() {
    toggleLocations('bldg');
});
$( ".labs" ).click(function() {
    toggleLocations('labs');
});

$( "#bldg_dropdown" ).click(function() {
    $(".bldg a.button").toggleClass( "markers_off" );
    toggleLocations('bldg');
});
$( "#pkng_dropdown" ).click(function() {
    $(".pkng a.button").toggleClass( "markers_off" );
    toggleLocations('pkng');
});
$( "#labs_dropdown" ).click(function() {
    $(".labs a.button").toggleClass( "markers_off" );
    toggleLocations('labs');
});

$(document).foundation();
$('.f-dropdown').click(function() {
    if ($(this).hasClass('open')) {
        $('span[data-dropdown="'+$(this).attr('id')+'"]').trigger('click');
        alert("close");
    }
});
