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

    <title>College of Nursing | UTHSC</title>
    <link rel="stylesheet" href="../-resources/2015/css/uthsc.css">
    <link rel="stylesheet" href="../-resources/2015/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,700,300italic,400">

    <!--*************************-->
    <!--Headcode for Search UTHSC-->
    <!--*************************-->
    <?php include ("map-db-connection.php"); ?>

    <style>
        .uthsc-map-link {
            background: #00a5e3;
            color: #fff;
            padding: 0.3rem;
            vertical-align: 25%;
            cursor: pointer;
        }

        #uthsc-map-canvas {
            width: 100%;
            height: 100%
        }

        @media screen and (max-width: 39.9375em) {
            #uthsc-map-canvas {
                height: 100vw
            }
        }

        .uthsc-map-menu {
            background: rgba(250, 250, 250, 0.9) !important;
            padding: 2rem;
            border-bottom: 0;
            border-top: 0;
            box-shadow: 0 -3px 0 #fefefe, 0 3px 0 #efefef, 2px 0px 4px #ccc
        }

        .uthsc-map-menu ul li {
            font-size: 1.3rem;
            padding: 0.5rem 0.6rem 0.5rem 1.5rem
        }

        .uthsc-map-menu ul li li {
            font-size: initial;
            padding: 0.1rem 0.5rem
        }

        @media screen and (min-width: 40em) {
            .uthsc-map-menu {
                position: absolute;
                z-index: 1;
                padding: 1rem !important
            }
        }

        @media screen and (max-width: 39.9375em) {
            .uthsc-map-menu {
                background: none !important;
                padding: 0;
                box-shadow: none
            }

            .uthsc-map-menu .is-drilldown {
                max-width: none;
                width: 100%;
                min-height: initial !important;
                height: 148px
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
            font-size: initial
        }

        .uthsc-map-list {
            overflow: auto;
            padding: 1rem
        }

        @media screen and (max-width: 39.9375em) {
            .uthsc-map-list {
                padding: 0.3rem 1rem;
                height: 148px;
                box-shadow: 0px -2px 4px #ddd inset, 0px 2px 4px #ddd inset
            }
        }

        .uthsc-map-list li {
            padding-bottom: 0.2rem
        }

        .uthsc-map-list ul {
            width: 100%
        }

        li.is-submenu-item.is-drilldown-submenu-item:hover {
            background: #ddd
        }

        li.is-submenu-item.is-drilldown-submenu-item a {
            font-weight: normal;
            text-indent: -0.65rem;
            padding-left: 0.2rem
        }

        li.is-submenu-item.is-drilldown-submenu-item a:before {
            content: "\203A \0020";
            list-style: none;
            font-size: 1.2em;
            color: #aaa
        }

        .uthsc-map-controls {
            margin: .5rem
        }

        .uthsc-map-controls .button {
            margin: 0;
            border-right: 1px solid;
        }

        .gm-style .gm-style-iw, .gm-style .gm-style-iw a, .gm-style .gm-style-iw span, .gm-style .gm-style-iw label, .gm-style .gm-style-iw div {
            font-size: 11px
        }

        .uthsc-map-pop-up-image {
            float: left;
            margin: 0.5rem 10px 0 0;
            width: 125px;
            height: auto;
            border: 1px solid #ddd
        }

        @media only screen
        and (min-device-width : 320px)
        and (max-device-width : 568px)
        and (orientation : landscape) {
            .uthsc-map-pop-up-image {
                width: 30%;
            }
        }
        @media only screen
        and (min-device-width : 320px)
        and (max-device-width : 568px)
        and (orientation : portrait) {
            .uthsc-map-pop-up-image {
                width: 15%;
            }
        }

        #get_link {
            width: 125px;
            background: none;
            text-align: center
        }

        #permalink_label {
            cursor: pointer;
            color: inherit
        }

        #to_here_link, #from_here_link {
            cursor: pointer
        }

        #directions_container {
            float: left
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
            width: 78%;
            float: left
        }

        .submit {
            border: 1px solid #A0A0A0;
            border-radius: 0 5px 5px 0;
            border-left: 0;
            font-size: 15px;
            height: 30px;
            width: 21%
        }

        input:checked ~ .switch-paddle {
            background: #F77F00
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

    <!--  Google Map Scripts-->
    <script src="js/directions.js"></script>
    <script src="js/map-markers.js"></script>
    <script src="js/toggle.js"></script>
    <!--/ Google Map Scripts-->

    <!--************-->
    <!--/ Google Map-->
    <!--************-->


    <!--*************************-->
    <!--Headcode for Search UTHSC-->
    <!--*************************-->


</head>
<body>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PR6VFZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PR6VFZ');</script>
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
                           placeholder="search" style="margin-right:0;" />
                    <input type="hidden" name="cx" value="010196583402354315885:vfumswlexgy" />
                    <input type="hidden" name="cof" value="FORID:11" />
                    <input type="hidden" name="ie" value="UTF-8" />
                    <input type="hidden" name="col" value="uthsc" />
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
                    <a aria-label="go to UTHSC homepage" href="/">
                        <span class="uthsc-home-icon-breadcrumbs fa fa-home fa-2x" aria-hidden="true"></span>
                    </a>
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                </li>
                <li>
                    <a aria-label="go to parent section - Research" href="#">Nursing</a>
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
            <ul class="row collapse" >
                <li class="uthsc-navigation-column small-2 columns">
                    <a href="https://uthsc.edu/nursing/about-the-college/index.php" data-equalizer-watch="heading-links">About</a>
                    <ul data-equalizer-watch="nested-links">
                        <li><a href="https://uthsc.edu/nursing/about-the-college/mission.php">Mission & Philosophy</a></li>
                        <li><a href="https://uthsc.edu/nursing/news/annual-reports.php">Annual Report</a></li>
                        <li><a href="https://uthsc.edu/nursing/about-the-college/history.php">History</a></li>
                        <li><a href="https://uthsc.edu/nursing/about-the-college/accreditation.php">Accreditation</a></li>
                        <li><a href="https://uthsc.edu/nursing/documents/strategic-map-12-16-15.pdf">Strategic Map</a></li>
                    </ul>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="#" data-equalizer-watch="heading-links">Students</a>
                    <ul data-equalizer-watch="nested-links">
                        <li><a href="https://uthsc.edu/nursing/future-students/index.php">Future Students</a></li>
                        <li><a href="https://uthsc.edu/nursing/acceptedstudents.php">Accepted Students</a></li>
                        <li><a href="https://uthsc.edu/nursing/current-students/index.php">Current Students</a></li>
                    </ul>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="https://uthsc.edu/nursing/academic-programs/index.php" data-equalizer-watch="heading-links">Academic Programs</a>
                    <ul data-equalizer-watch="nested-links"></ul>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="https://uthsc.edu/nursing/research-programs/index.php" data-equalizer-watch="heading-links">Research Programs</a>
                    <ul data-equalizer-watch="nested-links">

                    </ul>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="https://uthsc.edu/nursing/practice-programs/index.php" data-equalizer-watch="heading-links">Practice Programs</a>
                    <ul data-equalizer-watch="nested-links"></ul>
                </li>

                <li class="uthsc-navigation-column small-2 columns">
                    <a href="https://uthsc.edu/nursing/continuing-education/index.php" data-equalizer-watch="heading-links">Continuing Education</a>
                    <ul data-equalizer-watch="nested-links">
                        <li><a href="https://uthsc.edu/nursing/jobs.php">Job Opportunities</a></li>
                    </ul>
                </li>
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
                <h1>UTHSC Campus Map</h1>
            </div>
        </div>
        <div class="row expanded">
            <div class="columns">
<!--                ----->
                <ul>
                    <li>
                        <div class="bldg"><a href="#" class="button split tiny map_markers">&emsp;Buildings <span id="bldg_dropdown" data-dropdown="drop_bldg"> </span></a><br></div>
                        <ul id="drop_bldg" class="f-dropdown" data-dropdown-content="true">
                            <li>hey</li>
                        </ul>
                    </li>
                </ul>
<!--                ----->
                <div class="uthsc-map" data-equalizer="data-eqaulizer-maps">
                    <div class="columns uthsc-map-canvas" data-equalizer-watch="data-eqaulizer-watch-maps">
                        <div id="map_canvas" style="width: 100%;height: 100%;"></div>
                    </div>
                    <div class="columns large-3 large-offset-1 uthsc-map-menu" data-equalizer-watch="data-eqaulizer-watch-maps" style="position: absolute;">
                        <ul id="uthsc-map-menu-drilldown" class="vertical menu" data-drilldown>
                            <li>
                                <a href="#" id="uthsc-map-buildings"><span class="fa fa-building secondary" aria-hidden="true"></span>
                                    &emsp;Buildings</a>
                                <ul class="vertical menu uthsc-map-list uthsc-map-building-list">

                                    <div class="uthsc-map-icon-toggle-box">
                                        <p>Buildings</p>
                                        <div class="switch tiny">
                                            <input class="switch-input" id="buildings-switch" type="checkbox" name="buildings-switch">
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
                                <ul class="vertical menu uthsc-map-list uthsc-map-parking-list">
                                    <div class="uthsc-map-icon-toggle-box">
                                        <p>Parking</p>
                                        <div class="switch tiny">
                                            <input class="switch-input" id="parking-switch" type="checkbox" name="parking-switch">
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
                                <ul class="vertical menu uthsc-map-list uthsc-map-labs-list">
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
                                <ul class="vertical menu uthsc-map-list uthsc-map-labs-list">
                                    <li><a href="sitemap/campusmap.pdf">Memphis</a></li>
                                    <li><a href="http://gsm.utmck.edu/about/documents/utmc_campus_map2014.pdf">Knoxville</a></li>
                                    <li><a href="sitemap/chattanooga-map.pdf">Chattanooga</a></li>
                                </ul>
                            </li>
                        </ul>
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
    <!--Content Footer-->
    <!--**************-->
    <div class="uthsc-content-footer" aria-label="Section information and links" role="complementary">
        <div class="row">
            <div class="medium-4 columns footer-box">
                <h4>Contact Us</h4>

                <p>Office of Student Affairs<br />
                    920 Madison, #1020<br />
                    Memphis, TN 38163<br />
                    901-448-6125<br />
                    <a href="mailto:nurse.recruit@uthsc.edu">nurse.recruit@uthsc.edu</a>
                </p>
            </div>
            <div class="medium-4 columns footer-box">
                <h4>College Links</h4><ul>
                    <li><a href="">View an Info Session</a></li>
                    <li><a href="">Apply Online</a></li>
                    <li><a href="">Tuition & Fees</a></li>
                    <li><a href="">Scholarships</a></li>
                    <li><a href="">Financial Aid</a></li>
                </ul>
            </div>
            <div class="medium-4 columns footer-box hide-for-print">
                <h4>Social</h4>
                <h5>Share</h5>
                <div class="expanded button-group stacked-for-small small uthsc-share">
                    <a href="https://twitter.com/intent/tweet?text=Read%20this.&url=https://uthsc.edu/aboututhsc/utmission.php&via=uthsc&original_referer=https://uthsc.edu/&hashtags=Education,Research,Clinical-Care,PublicService&related=uthscadmissions%3AUTHSC%20Admissions,UTHSCRefDesk%3AUTHSC%20Library" class="button uthsc-twitter">
                        <span class="fa fa-twitter" aria-hidden="true"></span> Tweet
                        <span class="show-for-sr">on twitter</span>
                    </a>
                    <a href="https://www.facebook.com/sharer.php?u=https://uthsc.edu/aboututhsc/utmission.php" class="button uthsc-facebook">
                        <span class="fa fa-facebook" aria-hidden="true"></span> Share
                        <span class="show-for-sr">on facebook</span>
                    </a>
                    <a href="https://plus.google.com/share?url=https://uthsc.edu/aboututhsc/utmission.php" class="button uthsc-google-plus">
                        <span class="fa fa-google-plus" aria-hidden="true"></span> Share
                        <span class="show-for-sr">on google plus</span>
                    </a>
                </div>
                <div class="expanded button-group stacked-for-small small uthsc-share">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://uthsc.edu/aboututhsc/utmission.php&title=University%20of%20Tennessee%20Mission%20Statements&summary=Read%20this.&source=UTHSC" class="button uthsc-linkedin">
                        <span class="fa fa-linkedin" aria-hidden="true"></span> Share
                        <span class="show-for-sr">on linked in</span>
                    </a>
                    <a href="mailto:?body=Read%20this.%20https://uthsc.edu/aboututhsc/utmission.php.&amp;subject=University%20of%20Tennessee%20Mission%20Statements" class="button">
                        <span class="fa fa-envelope" aria-hidden="true"></span> email
                    </a>
                    <a href="javascript:window.print()" class="button uthsc-print">
                    <span class="fa fa-print" aria-hidden="true"></span> print
                    </a>
                </div>
                <h5>Connect</h5>
                <div class="uthsc-connect">
                    <a href="https://twitter.com/uthsc" class="uthsc-twitter">
                        <span class="fa fa-twitter-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on twitter</span>
                    </a>
                    <a href="https://www.facebook.com/uthsc#" class="uthsc-facebook">
                        <span class="fa fa-facebook-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on facebook</span>
                    </a>
                    <a href="https://www.instagram.com/uthsc/" class="uthsc-instagram">
                        <span class="fa fa-instagram fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on instagram</span>
                    </a>
                    <a href="https://www.youtube.com/user/uthsc" class="uthsc-youtube">
                        <span class="fa fa-youtube-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on youtube</span>
                    </a>
                    <a href="#" class="uthsc-linkedin">
                        <span class="fa fa-linkedin-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on linkedin</span>
                    </a>
                    <a href="#" class="uthsc-pinterest">
                        <span class="fa fa-pinterest-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on pinterest</span>
                    </a>
                    <a href="#" class="uthsc-google-plus">
                        <span class="fa fa-google-plus-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on google plus</span>
                    </a>
                    <a href="#" class="uthsc-tumblr">
                        <span class="fa fa-tumblr-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on tumblr</span>
                    </a>
                    <a href="#" class="uthsc-flickr">
                        <span class="fa fa-flickr fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on flickr</span>
                    </a>
                    <a href="#" class="uthsc-reddit">
                        <span class="fa fa-reddit-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on reddit</span>
                    </a>
                    <a href="#" class="uthsc-vine">
                        <span class="uthsc-fa-vine" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on vine</span>
                    </a>
                    <a href="#" class="uthsc-vimeo">
                        <span class="fa fa-vimeo-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on vimeo</span>
                    </a>
                    <a href="#" class="uthsc-snapchat">
                        <span class="fa fa-snapchat-square fa-3x" aria-hidden="true"></span>
                        <span class="show-for-sr">connect on snapchat</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--***************-->
    <!--/Content Footer-->
    <!--***************-->


    <!--**************-->
    <!--Last Published-->
    <!--**************-->
    <div class="uthsc-last-published text-center">
        <p><small>Last Published: Generated during publish by OUC</small></p>
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
<nav id="uthsc-off-canvas-menu--slide-left" class="uthsc-off-canvas-menu uthsc-off-canvas-menu--slide-left hide-for-print"
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
                <li><a href="#" title="College of Medicine">College of Nursing</a></li>
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
        <li><a href="#" class="link-heading">About</a>
            <ul>
                <li><a href="https://uthsc.edu/nursing/about-the-college/mission.php">Mission & Philosophy</a></li>
                <li><a href="https://uthsc.edu/nursing/news/annual-reports.php">Annual Report</a></li>
                <li><a href="https://uthsc.edu/nursing/about-the-college/history.php">History</a></li>
                <li><a href="https://uthsc.edu/nursing/about-the-college/accreditation.php">Accreditation</a></li>
                <li><a href="https://uthsc.edu/nursing/documents/strategic-map-12-16-15.pdf">Strategic Map</a></li>
            </ul>
        </li>

        <li><a href="#" class="link-heading">Students</a>
            <ul>
                <li><a href="https://uthsc.edu/nursing/future-students/index.php">Future Students</a></li>
                <li><a href="https://uthsc.edu/nursing/acceptedstudents.php">Accepted Students</a></li>
                <li><a href="https://uthsc.edu/nursing/current-students/index.php">Current Students</a></li>
            </ul>
        </li>

        <li><a href="#" class="link-heading">Academic Programs </a>
            <ul>
            </ul>
        </li>

        <li><a href="#" class="link-heading">Research Programs</a>
            <ul>

            </ul>
        </li>
        <li><a href="#" class="link-heading">Practice Programs</a>
            <ul>

            </ul>
        </li>
        <li><a href="#" class="link-heading">Continuing Education</a>
            <ul>
                <li><a href="https://uthsc.edu/nursing/jobs.php">Job Opportunities</a></li>
            </ul>
        </li>
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
<nav id="uthsc-off-canvas-menu--slide-right" class="uthsc-off-canvas-menu uthsc-off-canvas-menu--slide-right hide-for-print"
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
                <li><a href="#" title="College of Medicine">College of Nursing</a></li>
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

        <a href="/education/"><span class="uthsc-fa-centered fa fa-graduation-cap" aria-hidden="true"></span>&emsp;Academics</a>
        <a href="/research/"><span class="uthsc-fa-centered fa fa-flask" aria-hidden="true"></span>&emsp;Research</a>
        <a href="/clinicalcare/"><span class="uthsc-fa-centered fa fa-medkit" aria-hidden="true"></span>&emsp;Clinical Care</a>
        <a href="/publicservice/"><span class="uthsc-fa-centered fa fa-globe" aria-hidden="true"></span>&emsp;Public Service</a>
    </div>

    <a href="#" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-gift" aria-hidden="true"></span>&emsp;Make a Gift</a>
    <a href="template.php" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-road" aria-hidden="true"></span>&emsp;Take a Tour</a>

    <ul>
        <li><span class="link-heading">Information for...</span>
            <ul>
                <li><a href="#">Students</a></li>
                <li><a href="#">Faculty &amp; Staff</a></li>
                <li><a href="#">Alumni</a></li>
                <li><a href="#">Visitors</a></li>
                <li><a href="#">Patients</a></li>
            </ul>
        </li>
        <li><span class="link-heading">Resources</span>
            <ul>
                <li><a href="#">Banner</a></li>
                <li><a href="#">Blackboard</a></li>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">Career Opportunities</a></li>
                <li><a href="#">iLogin</a></li>
                <li><a href="#">Maps</a></li>
                <li><a href="#">MyUT</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Webmail</a></li>
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
    <button id="uthsc-off-canvas-button--slide-left" class="toggle-slide-left button" style="background-image: url('/-resources/2015/images/nav-toggler-left-college.png')"></button>
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
<script src="js/campusmap-resize.js"></script>
<!--**************************-->
<!--/Footcode for Search UTHSC-->
<!--**************************-->
<script>
    $('#uthsc-map-buildings').trigger('click');
</script>

</body>
</html>