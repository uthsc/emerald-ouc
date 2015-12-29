/**
 * UTHSC section nav module.
 */
!function($) {

    // sticky navigation - makes section navigation 'stick'
    // to the top of the screen on desktop
    // allows foundation's sticky class to be used elsewhere.
    $(document).ready(function() {
        var stickyNavTop = $('.uthsc-section-nav').offset().top;

        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                $('.uthsc-section-nav').addClass('uthsc-sticky');
            } else {
                $('.uthsc-section-nav').removeClass('uthsc-sticky');
            }
        };

        stickyNav();

        $(window).scroll(function() {
            stickyNav();
        });
    });

}(jQuery);