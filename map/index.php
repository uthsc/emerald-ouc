<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--unfurling-->
    <!-- facebook, google+, linkedin open graph tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://uthsc.edu/">
    <meta property="og:title" content="xxxx">
    <meta property="og:description" content="xxxx">
    <meta property="og:image" content="https://uthsc.edu/xxxx">
    <!--/unfurling-->

    <title>Campus Map | UTHSC</title>
    <link rel="stylesheet" href="../-resources/2015/css/uthsc.css">
    <link rel="stylesheet" href="../-resources/2015/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,700,300italic,400">

    <!--*************************-->
    <!--Headcode for Search UTHSC-->
    <!--*************************-->
    <?php include("map-db-connection.php"); ?>

    <style>
        .main-content .vertical a {
            color: #555555 !important;
        }

        .is-drilldown-submenu-parent > a {
            padding: .6rem !important;
        }

        .main-content .vertical a .fa {
            width: 1rem;
            text-align: center;
        }

        .main-content .vertical a .fa.fa-building {
            color: #006a4d;
        }

        .main-content .vertical a .fa.fa-car {
            color: #00a5e3;
        }

        .main-content .vertical a .fa.fa-desktop {
            color: #e8cf00;
        }

        .uthsc-map-link {
            background: #00a5e3;
            color: #fff;
            padding: 0.3rem;
            vertical-align: 25%;
            cursor: pointer;
        }

        #uthsc-map-canvas {
            width: 100%;
            height: 100%;
        }

        @media screen and (max-width: 39.9375em) {
            #uthsc-map-canvas {
                height: 100vw;
            }
        }

        .uthsc-map-menu {
            background: rgba(250, 250, 250, 0.9) !important;
            padding: 2rem;
            border-bottom: 0;
            border-top: 0;
            box-shadow: 0 -3px 0 #fefefe, 0 3px 0 #efefef, 2px 0 4px #ccc;
        }

        .uthsc-map-menu ul li {
            font-size: 1.3rem;
        }

        .uthsc-map-menu ul li li {
            font-size: initial;
        }

        .uthsc-map-menu ul li li a {
            padding: 0.1rem 0;
        }

        @media screen and (min-width: 40em) {
            .uthsc-map-menu {
                position: absolute;
                z-index: 1;
                padding: 1rem !important;
            }
        }

        .uthsc-map-menu .is-drilldown {
            min-height: initial !important;
            height: 600px !important;
        }

        @media screen and (max-width: 39.9375em) {
            .uthsc-map-menu {
                background: none !important;
                padding: 0;
                box-shadow: none;
                height: initial !important;
            }

            .uthsc-map-menu .is-drilldown {
                max-width: none;
                width: 100%;
                min-height: initial !important;
                height: initial !important;
            }
        }

        .uthsc-map-icon-toggle-box {
            display: inline-block;
            text-align: center;
            padding: 0.6rem;
            background-color: #efefef;
            margin-left: 1rem;
            max-width: 100px;
            position: absolute;
            right: 0;
            top: 0;
            font-size: initial;
        }

        .uthsc-map-list {
            overflow: auto;
            padding: 1rem;
        }

        @media screen and (max-width: 39.9375em) {
            .uthsc-map-list {
                padding: 0.3rem 1rem;
                height: 155px;
                box-shadow: 0px -2px 4px #ddd inset, 0px 2px 4px #ddd inset
            }
        }

        .uthsc-map-list li {
            padding-bottom: 0.2rem;
        }

        .uthsc-map-list ul {
            width: 100%;
        }

        li.is-submenu-item.is-drilldown-submenu-item:hover {
            background: #ddd;
        }

        li.is-submenu-item.is-drilldown-submenu-item a {
            font-weight: normal;
            text-indent: -0.65rem;
            padding-left: 0.2rem;
        }

        li.is-submenu-item.is-drilldown-submenu-item a:before {
            content: "\203A \0020";
            list-style: none;
            font-size: 1.2em;
            color: #aaa;
        }

        .uthsc-map-controls {
            margin: .5rem;
        }

        .uthsc-map-controls .button {
            margin: 0;
            border-right: 1px solid;
        }

        .gm-style .gm-style-iw, .gm-style .gm-style-iw a, .gm-style .gm-style-iw span, .gm-style .gm-style-iw label, .gm-style .gm-style-iw div {
            font-size: 11px;
        }

        .uthsc-map-pop-up-image {
            float: left;
            margin: 0.5rem 10px 0 0;
            width: 125px;
            height: auto;
            border: 1px solid #ddd;
        }

        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 568px)
        and (orientation: landscape) {
            .uthsc-map-pop-up-image {
                width: 30%;
            }
        }

        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 568px)
        and (orientation: portrait) {
            .uthsc-map-pop-up-image {
                width: 15%;
            }
        }

        #get_link {
            width: 125px;
            background: none;
            text-align: center;
        }

        #permalink_label {
            cursor: pointer;
            color: inherit;
        }

        #to_here_link, #from_here_link {
            cursor: pointer;
        }

        #directions_container {
            float: left;
            width: 58%;
        }

        #directions_container p {
            margin-top: 1rem;
            margin-bottom: .2rem
        }

        #visible_dir {
            border: 1px solid #909090;
            border-radius: 5px 0 0 5px;
            font-size: 15px;
            height: 30px;
            padding: 0 0 0 6px;
            width: 72%;
            float: left;
        }

        .submit {
            border: 1px solid #A0A0A0;
            border-radius: 0 5px 5px 0;
            border-left: 0;
            font-size: 15px;
            height: 30px;
            width: 21%;
        }

        input:checked ~ .switch-paddle {
            background: #F77F00;
        }
    </style>

    <!--************-->
    <!--  Google Map-->
    <!--************-->

    <!--  Google Map API-->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSINp44TI5M-qhfzNUWCX82uEoocmoWV0">
    </script>
    <!--/ Google Map API-->

    <!--************-->
    <!--/ Google Map-->
    <!--************-->


    <!--*************************-->
    <!--Headcode for Search UTHSC-->
    <!--*************************-->


</head>
<body>

<!-- Google Tag Manager -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-PR6VFZ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PR6VFZ');</script>
<!-- End Google Tag Manager -->


<a href="#main-content" class="show-on-focus">Skip to content</a>

<!--******************-->
<!--Off canvas wrapper-->
<!--******************-->
<div id="uthsc-off-canvas-wrapper" class="uthsc-off-canvas-wrapper">

    <!--*****************-->
    <!--UTHSC site nav-->
    <!--*****************-->
    <?php include('../uthsc-site-nav.php'); ?>
    <!--******************-->
    <!--/UTHSC site nav-->
    <!--******************-->


    <!--******-->
    <!--Banner-->
    <!--******-->
    <header aria-label="UTHSC Logo" role="banner" class="uthsc-banner hide-for-print">
        <div class="row">
            <div class="medium-10 large-8 small-centered columns">
                <a href="https://uthsc.edu">
                    <img src="../-resources/2015/images/uthsc-logo-white-text.svg" alt="UTHSC logo" class="uthsc-logo"/>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="hide-for-large columns small-collapse">
                <!--Search form-->
                <form class="input-group" aria-label="Search the UTHSC site"
                      action="https://uthsc.edu/search/" method="get" style="margin-bottom:0;">
                    <input type="search" aria-label="Search the UTHSC site" role="search" name="q"
                           placeholder="search" style="margin-right:0;"/>
                    <input type="hidden" name="cx" value="010196583402354315885:vfumswlexgy"/>
                    <input type="hidden" name="cof" value="FORID:11"/>
                    <input type="hidden" name="ie" value="UTF-8"/>
                    <input type="hidden" name="col" value="uthsc"/>
                    <div class="input-group-button">
                        <button type="submit" class="button" aria-label="Submit search form">
                            <span class="fa fa-search" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
                <!--/Search form-->
            </div>
        </div>
    </header>
    <!--*******-->
    <!--/Banner-->
    <!--*******-->

    <!--**********************-->
    <!--Emergency Notification-->
    <!--**********************-->
    <div class="row expanded hide-for-print emergency-notification" style="display:none;">
        <div class="columns callout alert large-12" style="margin-bottom:0; padding:0;" data-closable>
            <div class="row">
                <h2>Emergency Notification!</h2>
                <p>This section will be used for emergency notifications.</p>

                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <!--***********************-->
    <!--/Emergency Notification-->
    <!--***********************-->

    <!--***********-->
    <!--Breadcrumbs-->
    <!--***********-->
    <nav aria-label="Bread crumbs - you are here:" role="navigation" class="uthsc-breadcrumbs">
        <div class="row">
            <ul class="breadcrumbs column">
                <li>
                    <a aria-label="go to UTHSC homepage" href="/redesign/">
                        <span class="uthsc-home-icon-breadcrumbs fa fa-home fa-2x"></span>
                    </a>
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                </li>
                <li>
                    <a aria-label="go to parent section - Research" href="#">Campus Map</a>
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                </li>
                <li class="disabled" aria-hidden="true">Current Page</li>
            </ul>
        </div>
    </nav>
    <!--************-->
    <!--/Breadcrumbs-->
    <!--************-->


    <!--*****************-->
    <!--UTHSC Section Nav-->
    <!--*****************-->
    <div data-equalizer="heading-links">
        <nav id="uthsc-section-navigation" data-equalizer="nested-links" aria-label="Current section menu"
             role="navigation" class="hide-for-print">
            <ul class="row collapse" data-equalizer="heading-links">

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="/education/" data-equalizer-watch="heading-links"><span aria-hidden="true" class="fa fa-graduation-cap"></span> Academics</a>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="/redesign/research/" data-equalizer-watch="heading-links"><span aria-hidden="true" class="fa fa-flask"></span> Research</a>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="/clinicalcare/" data-equalizer-watch="heading-links"><span aria-hidden="true" class="fa fa-medkit"></span>Clinical Care</a>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="/publicservice/" data-equalizer-watch="heading-links"><span aria-hidden="true" class="fa fa-globe"></span>Public Service</a>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="/aboututhsc/" data-equalizer-watch="heading-links"><span aria-hidden="true" class="fa fa-file-text-o"></span>About UTHSC</a>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="http://uthscalumni.com/" data-equalizer-watch="heading-links"><span aria-hidden="true" class="fa fa-users"></span>Alumni &amp; Friends</a>
                </li>

                <li class="uthsc-navigation-column small-2 columns"></li>
            </ul>
        </nav>
        <div class="uthsc-section-nav-placeholder show-for-large" data-equalizer-watch="heading-links"></div>
    </div>
    <!--******************-->
    <!--/UTHSC Section Nav-->
    <!--******************-->


    <!--*******-->
    <!--Content-->
    <!--*******-->
    <div class="main-content" id="main-content" aria-label="Page content" role="main">
        <!--**********-->
        <!--Page title-->
        <!--**********-->
        <div class="row">
            <div class="columns uthsc-row-title">
                <h1>Campus Map</h1>
            </div>
        </div>
        <div class="row expanded">
            <div class="columns">
                <div class="button-group secondary hide-for-small-only">
                    <a href="#main-content" class="button"><span class="fa fa-arrows-v"></span> Align Map</a>
                    <a class="button" id="uthsc-map-zoom-campus"><span class="fa fa-flag"></span> Campus</a>
                    <a class="button" id="uthsc-map-zoom-3d"><span class="fa fa-cube"></span> Campus 3D</a>
                    <a class="button" id="uthsc-map-zoom-city"><span class="fa fa-building-o"></span> Memphis</a>
                    <a class="button" id="uthsc-map-zoom-state"><span class="fa fa-map"></span> Tennessee</a>
                </div>
                <div id="uthsc-center-map-on-page-mobile" class="small-collapse"
                     data-equalizer="data-eqaulizer-maps" data-equalize-on-stack="false">
                    <div class="columns medium-3 medium-push-1 uthsc-map-menu" data-equalizer-watch="data-eqaulizer-maps">
                        <ul id="uthsc-map-menu-drilldown" class="vertical menu" data-drilldown>
                            <li>
                                <a href="#" id="uthsc-map-buildings"><span class="fa fa-building secondary"
                                                                           aria-hidden="true"></span>
                                    &emsp;Buildings</a>
                                <ul class="vertical menu uthsc-map-list">

                                    <div class="uthsc-map-icon-toggle-box">
                                        <p>Buildings</p>
                                        <div class="switch tiny">
                                            <input class="switch-input" id="buildings-switch" type="checkbox" checked="checked"
                                                   name="buildings-switch">
                                            <label class="switch-paddle" for="buildings-switch">
                                                <span class="switch-active" aria-hidden="true">On</span>
                                                <span class="switch-inactive" aria-hidden="true">Off</span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php echo $bldg_list; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-car secondary" aria-hidden="true"></span>
                                    &emsp;Parking</a>
                                <ul class="vertical menu uthsc-map-list">
                                    <div class="uthsc-map-icon-toggle-box">
                                        <p>Parking</p>
                                        <div class="switch tiny">
                                            <input class="switch-input" id="parking-switch" type="checkbox" checked="checked"
                                                   name="parking-switch">
                                            <label class="switch-paddle" for="parking-switch">
                                                <span class="switch-active" aria-hidden="true">On</span>
                                                <span class="switch-inactive" aria-hidden="true">Off</span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php echo $pkng_list; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-desktop secondary" aria-hidden="true"></span>
                                    &emsp;Student Computer Labs</a>
                                <ul class="vertical menu uthsc-map-list">
                                    <div class="uthsc-map-icon-toggle-box">
                                        <p>Student Computer Labs</p>
                                        <div class="switch tiny">
                                            <input class="switch-input" id="labs-switch" type="checkbox" name="labs-switch">
                                            <label class="switch-paddle" for="labs-switch">
                                                <span class="switch-active" aria-hidden="true">On</span>
                                                <span class="switch-inactive" aria-hidden="true">Off</span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php echo $labs_list; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-print secondary" aria-hidden="true"></span>
                                    &emsp;Printable Maps (PDF)</a>
                                <ul class="vertical menu uthsc-map-list">
                                    <li><a href="sitemap/campusmap.pdf">Memphis</a></li>
                                    <li><a href="http://gsm.utmck.edu/about/documents/utmc_campus_map2014.pdf">Knoxville</a>
                                    </li>
                                    <li><a href="sitemap/chattanooga-map.pdf">Chattanooga</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="columns sm-1 show-for-small-only text-center uthsc-map-controls">
                        <div class="button-group secondary tiny show-for-small-only">
                            <a href="#uthsc-center-map-on-page-mobile" class="button"><span class="fa fa-arrows-v"></span> Align
                                Map</a>
                            <a class="button" id="uthsc-map-zoom-campus-mobile"><span class="fa fa-flag"></span> Campus</a>
                            <a class="button" id="uthsc-map-zoom-3d-mobile"><span class="fa fa-cube"></span> Campus 3D</a>
                            <a class="button" id="uthsc-map-zoom-city-mobile"><span class="fa fa-building-o"></span> Memphis</a>
                            <a class="button" id="uthsc-map-zoom-state-mobile"><span class="fa fa-map"></span> Tennessee</a>
                        </div>
                    </div>
                    <div class="columns uthsc-map" data-equalizer-watch="data-eqaulizer-maps">
                        <div id="uthsc-map-canvas"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--***********-->
        <!--/Page title-->
        <!--***********-->
    </div>
    <!--********-->
    <!--/Content-->
    <!--********-->


    <!--******-->
    <!--Footer-->
    <!--******-->

    <!--**************-->
    <!--Last Published-->
    <!--**************-->
    <div class="uthsc-last-published text-center">
        <p>
            <small>Last Published: Generated during publish by OUC</small>
        </p>
    </div>
    <!--***************-->
    <!--/Last Published-->
    <!--***************-->


    <!--*************-->
    <!--Global Footer-->
    <!--*************-->
    <?php include('../uthsc-global-footer.php') ?>
    <!--**************-->
    <!--/Global Footer-->
    <!--**************-->

    <!--*******-->
    <!--/Footer-->
    <!--*******-->


    <!--************************************-->
    <!--Mobile navigation bottom spacing fix-->
    <!--************************************-->
    <div class="mobile-nav-bottom-spacing-fix hide-for-large"></div>

    <!--Safari bottom nav fix-->
    <div class="safari-bottom-nav-fix"></div>
    <!--Safari bottom nav fix-->
    <!--*************************************-->
    <!--/Mobile navigation bottom spacing fix-->
    <!--*************************************-->

</div>
<!--*******************-->
<!--/Off canvas wrapper-->
<!--*******************-->

<!--********************-->
<!--Left off canvas menu-->
<!--********************-->
<nav id="uthsc-off-canvas-menu--slide-left"
     class="uthsc-off-canvas-menu uthsc-off-canvas-menu--slide-left hide-for-print"
     aria-hidden="true">
    <!--Breadcrumbs-->
    <div class="uthsc-off-canvas-breadcrumbs button-group">
        <a href="/" class="button home-button"><span class="fa fa-home" aria-hidden="true"></span></a>
        <button class="button breadcrumbs-button dropdown" type="button" data-toggle="left-breadcrumbs-dropdown">
            Breadcrumbs Back Home
        </button>
        <div class="dropdown-pane bottom" id="left-breadcrumbs-dropdown" data-dropdown="data-dropdown"
             data-v-offset="0" data-auto-focus="true">
            <ul class="uthsc-off-canvas-breadcrumbs-list">
                <li><a href="/" title="Home">Back to the Homepage</a></li>
                <li><a href="#" title="Campus Map">Campus Map</a></li>
                <li class="disabled"><strong>Current Page</strong></li>
            </ul>
        </div>
    </div>

    <div class="off-canvas-search">
        <?php include('../off-canvas-search-form.php'); ?>
    </div>

    <!--Close menu button-->
    <button class="uthsc-off-canvas-menu__close">
        <span class="fa fa-chevron-left" aria-hidden="true"></span>&emsp; Close Menu
    </button>

    <ul>
        <li><a href="/education/" class="link-heading">Academics</a></li>
        <li><a href="/redesign/research/" class="link-heading">Research</a></li>
        <li><a href="/clinicalcare/" class="link-heading">Clinical Care</a></li>
        <li><a href="/publicservice/" class="link-heading">Public Service</a></li>
        <li><a href="/aboututhsc/" class="link-heading">About UTHSC</a></li>
        <li><a href="http://uthscalumni.com/" class="link-heading">Alumni &amp; Friends</a></li>
    </ul>

    <!--Safari bottom nav fix-->
    <div class="safari-bottom-nav-fix"></div>
    <!--Safari bottom nav fix-->
</nav>
<!--*********************-->
<!--/Left off canvas menu-->
<!--*********************-->

<!--*********************-->
<!--Right off canvas menu-->
<!--*********************-->
<nav id="uthsc-off-canvas-menu--slide-right"
     class="uthsc-off-canvas-menu uthsc-off-canvas-menu--slide-right hide-for-print"
     aria-hidden="true">

    <!--Breadcrumbs-->
    <div class="uthsc-off-canvas-breadcrumbs button-group">
        <a href="/" class="button home-button"><span class="fa fa-home" aria-hidden="true"></span></a>
        <button class="button breadcrumbs-button dropdown" type="button" data-toggle="right-breadcrumbs-dropdown">
            Breadcrumbs Back Home
        </button>
        <div class="dropdown-pane bottom" id="right-breadcrumbs-dropdown" data-dropdown="data-dropdown"
             data-v-offset="0" data-auto-focus="true">
            <ul class="uthsc-off-canvas-breadcrumbs-list">
                <li><a href="/" title="Home">Back to the Homepage</a></li>
                <li><a href="#" title="Campus Map">Campus Map</a></li>
                <li class="disabled"><strong>Current Page</strong></li>
            </ul>
        </div>
    </div>

    <div class="off-canvas-search">
        <?php include('../off-canvas-search-form.php'); ?>
    </div>

    <!--Close menu button-->
    <button class="uthsc-off-canvas-menu__close">
        Close Menu &emsp;<span class="fa fa-chevron-right" aria-hidden="true"></span>
    </button>

    <!--Mission links-->
    <div class="mission-links">
        <h2 class="link-heading">Mission</h2>

        <a href="/education/"><span class="uthsc-fa-centered fa fa-graduation-cap"></span>&emsp;Academics</a>
        <a href="/redesign/research/"><span class="uthsc-fa-centered fa fa-flask"></span>&emsp;Research</a>
        <a href="/clinicalcare/"><span class="uthsc-fa-centered fa fa-medkit"></span>&emsp;Clinical Care</a>
        <a href="/publicservice/"><span class="uthsc-fa-centered fa fa-globe"></span>&emsp;Public Service</a>
    </div>

    <a href="/give/" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-gift" aria-hidden="true"></span>&emsp;Make
        a Gift</a>
    <a href="/admissions/visit-uthsc.php" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-road"
                                                                            aria-hidden="true"></span>&emsp;Take a Tour</a>

    <ul>
        <li><span class="link-heading">Information for...</span>
            <ul>
                <li><a href="/students/">Students</a></li>
                <li><a href="/faculty/">Faculty &amp; Staff</a></li>
                <li><a href="/alumni/">Alumni</a></li>
                <li><a href="/visitors/">Visitors</a></li>
                <li><a href="/clinicalcare/">Patients</a></li>
            </ul>
        </li>
        <li><span class="link-heading">Resources</span>
            <ul>
                <li><a href="/banner/info/">Banner</a></li>
                <li><a href="http://courses.uthsc.edu/">Blackboard</a></li>
                <li><a href="http://events.uthsc.edu/">Calendar</a></li>
                <li><a href="http://uthsc.edu/hr/employment/">Career Opportunities</a></li>
                <li><a href="/ilogin/">iLogin</a></li>
                <li><a href="/redesign/map/">Maps</a></li>
                <li><a href="http://utap.tennessee.edu/">MyUT</a></li>
                <li><a href="http://news.uthsc.edu/">News</a></li>
                <li><a href="http://o365.uthsc.edu/">Webmail</a></li>
            </ul>
        </li>
    </ul>

    <!--Safari bottom nav fix-->
    <div class="safari-bottom-nav-fix"></div>
    <!--Safari bottom nav fix-->
</nav>
<!--**********************-->
<!--/Right off canvas menu-->
<!--**********************-->


<!--***************-->
<!--Off canvas mask-->
<!--***************-->
<div id="uthsc-off-canvas-mask" class="uthsc-off-canvas-mask hide-for-print"></div><!-- /uthsc-off-canvas-mask -->
<!--****************-->
<!--/Off canvas mask-->
<!--****************-->

<!--******************-->
<!--Off canvas buttons-->
<!--******************-->
<div aria-hidden="true" id="mobile-navigation" class="hide-for-large hide-for-print">
    <button id="uthsc-off-canvas-button--slide-left" class="toggle-slide-left button"
            style="background-image: url('/-resources/2015/images/section-button-images/nav-toggler-left-home-page.png');"></button>
    <button id="uthsc-off-canvas-button--slide-right" class="toggle-slide-right button"></button>

    <!--Safari bottom nav fix-->
    <div class="safari-bottom-nav-fix"></div>
    <!--Safari bottom nav fix-->
</div>
<!--*******************-->
<!--/Off canvas buttons-->
<!--*******************-->

<!--*******-->
<!--Scripts-->
<!--*******-->
<script src="../-resources/2015/js/jquery.min.js"></script>
<script src="../-resources/2015/js/what-input.min.js"></script>
<script src="../-resources/2015/js/foundation.min.js"></script>
<script src="../-resources/2015/js/uthsc.min.js"></script>
<!--********-->
<!--/Scripts-->
<!--********-->

<!--*************************-->
<!--Footcode for Search UTHSC-->
<!--*************************-->

<!--  Google Map Scripts-->
<?php echo '<script> var locations = ['.$locations.']; </script>'; ?>
<script src="js/campusmap-resize.js"></script>
<script src="js/directions.js"></script>
<script src="js/map-markers.js"></script>
<script src="js/toggle.js"></script>
<!--/ Google Map Scripts-->

<!--**************************-->
<!--/Footcode for Search UTHSC-->
<!--**************************-->

</body>
</html>