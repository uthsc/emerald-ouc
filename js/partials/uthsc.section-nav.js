/**
 * UTHSC section nav module.
 */
!function($) {

    // sticky navigation - makes section navigation 'stick'
    // to the top of the screen on desktop
    // allows foundation's sticky class to be used elsewhere.
    $(document).ready(function() {

        var stickyNavTop = $('#uthsc-section-navigation').offset().top;

        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                $('#uthsc-section-navigation').addClass('uthsc-sticky');
            } else {
                $('#uthsc-section-navigation').removeClass('uthsc-sticky');
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
    jQuery("#uthsc-section-navigation").bind('mouseleave', closeSubMenu);

    function expandMenu() {
        //$('#uthsc-section-navigation ul li ul').stop(true, true).slideDown(400);
        $('#uthsc-section-navigation').removeClass('hide-class');
    }

    function collapseMenu() {
        //$('#uthsc-section-navigation ul li ul').stop(true, true).slideUp(400);
        $('#uthsc-section-navigation').addClass('hide-class');
    }

    function clearTimer() {
        clearTimeout(closeTimer);
        clearTimeout(openTimer);
    }

    function openSubMenu() {
        //$('#uthsc-section-navigation').addClass('uthsc-navigation-active');
        clearTimer();
        openTimer = setTimeout(expandMenu, 400);
    }

    function closeSubMenu() {
        //$('#uthsc-section-navigation').removeClass('uthsc-navigation-active');

        clearTimer();
        closeTimer = setTimeout(collapseMenu, 400);
    }

    $("#uthsc-section-navigation").on( 'keyup', function( e ) {
        openSubMenu();
    } );

    $(document).ready(function () {
        closeSubMenu();
    });

}(jQuery);