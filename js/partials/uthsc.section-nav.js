/**
 * UTHSC section nav module.
 */
!function($) {

    // sticky navigation - makes section navigation 'stick'
    // to the top of the screen on desktop
    // allows foundation's sticky class to be used elsewhere.
    $(document).ready(function() {

        var stickyNavTop = $('#uthsc-navigation-alt').offset().top;

        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                $('#uthsc-navigation-alt').addClass('uthsc-sticky');
            } else {
                $('#uthsc-navigation-alt').removeClass('uthsc-sticky');
            }
        };

        stickyNav();

        $(window).scroll(function() {
            stickyNav();
        });
    });

    //expanding menu
    var openTimer;
    var closeTimer;
    var endTimer;

    jQuery(".uthsc-navigation-column").bind('mouseover', openSubMenu);
    jQuery("#uthsc-navigation-alt").bind('mouseleave', closeSubMenu);

    function expandMenu() {
        //$('#uthsc-navigation-alt ul li ul').stop(true, true).slideDown(400);
        $('#uthsc-navigation-alt').removeClass('hide-class');
    }

    function collapseMenu() {
        //$('#uthsc-navigation-alt ul li ul').stop(true, true).slideUp(400);
        $('#uthsc-navigation-alt').addClass('hide-class');
    }

    function clearTimer() {
        clearTimeout(closeTimer);
        clearTimeout(openTimer);
    }

    function openSubMenu() {
        //$('#uthsc-navigation-alt').addClass('uthsc-navigation-active');
        clearTimer();
        openTimer = setTimeout(expandMenu, 400);
    }

    function closeSubMenu() {
        //$('#uthsc-navigation-alt').removeClass('uthsc-navigation-active');

        clearTimer();
        closeTimer = setTimeout(collapseMenu, 400);
    }

    $("#uthsc-navigation-alt").on( 'keyup', function( e ) {
        openSubMenu();
    } );

    $(document).ready(function () {
        closeSubMenu();
    });

}(jQuery);