$(document).ready(function detectBrowser() {


    var useragent = navigator.userAgent;
    var mapdiv = document.getElementById("map_canvas");

    if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('iPad') != -1 || useragent.indexOf('Android') != -1) {
        mapdiv.style.width = '95%';
        mapdiv.style.height = '89%';
        mapdiv.style.margin = '0 0 0 2.5%';
        /*mapdiv.style.float = 'right';
         mapdiv.style.margin = '10px';
         mapdiv.style.border = '2px solid';
         mapdiv.style['border-radius'] = '10px';
         mapdiv.style['box-shadow'] = '3px 3px 3px #000';*/
    }
});