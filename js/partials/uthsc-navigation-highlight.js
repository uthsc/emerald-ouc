var loc = window.location.pathname;
if (loc[loc.length - 1] == '/') {
    loc += "index.php";
}
var $anchor = $('a[href="' + loc + '"]');
console.log($anchor);
$anchor.closest('li').addClass('uthsc-nav-on');
$anchor.removeClass('link-heading');
