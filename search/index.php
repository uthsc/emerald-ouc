<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--***************-->
    <!--Open Graph Tags-->
    <!--***************-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://uthsc.edu/">
    <meta property="og:title" content="xxxx">
    <meta property="og:description" content="xxxx">
    <meta property="og:image" content="https://uthsc.edu/xxxx">
    <!--****************-->
    <!--/Open Graph Tags-->
    <!--****************-->

    <title>Search - UTHSC</title>

    <link rel="stylesheet" href="../-resources/2015/css/uthsc.css">
    <link rel="stylesheet" href="../-resources/2015/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,700,300italic,400">
    <link rel="shortcut icon" href="/images/favicon.ico?v=083012-1411" />

    <!--*************************-->
    <!--Headcode for Search UTHSC-->
    <!--*************************-->
    <?php
        /*
         * Assign search query to global js variable
         */
        echo $_GET['q'] ?  '<script>var searchUthscQuery = "' . addslashes($_GET['q']) . '"</script>' : '';

        /*
         * Assign search type to global js variable
         */
        echo $_GET['col'] ?  '<script>var searchUthscType = "' . $_GET['col'] . '"</script>' : '';

        include '/var/www/html/search/scripts/lookup.php';

        echo '<script>var peopleSearchResults = ' . $people_search . '</script>';
    ?>
    <style>
        iframe.uthsc-search-results{width: 100%;border: 0}
        .uthsc-banner form { display:none; }
        .uthsc-row-title { border:0; margin-bottom:0; }
        #people-search-results-system table td, #people-search-results-campus table td{ font-size:.8em; }
        .tabs-content {margin-bottom: 2em;}
        small {margin-bottom:1em; display:block;}
    </style>
    <!--*************************-->
    <!--Headcode for Search UTHSC-->
    <!--*************************-->
</head>

<body>

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
       <header aria-label="UTHSC Logo" role="banner" class="uthsc-banner hide-for-print"
               style="border-bottom: 1px solid #00835f;">
           <div class="row">
               <div class="medium-10 large-8 small-centered columns">
                   <a href="/">
                       <img src="/-resources/2015/images/uthsc-logo-white-text.svg" alt="UTHSC logo" class="uthsc-logo"/>
                   </a>
               </div>
           </div>

           <div class="row">
               <div class="columns small-collapse">
                   <?php include('../uthsc-search-form.php'); ?>
               </div>
           </div>
       </header>
       <!--*******-->
       <!--/Banner-->
       <!--*******-->


       <!--**********************-->
       <!--Emergency Notification-->
       <!--**********************-->
       <div class="row expanded hide-for-print uthsc-emergency-notification"></div>
       <!--***********************-->
       <!--/Emergency Notification-->
       <!--***********************-->


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


           <!--title-->
           <div class="row">
               <div class="columns">
                   <div class="columns uthsc-row-title">
                       <h1>Search UTHSC</h1>
                   </div>
               </div>
           </div>
           <!--/title-->


           <!--row-->
           <div class="row expanded">
               <div class="columns">

                   <!--*****************-->
                   <!--UTHSC search form-->
                   <!--*****************-->
                   <div class="row expanded">
                       <div class="row">
                           <div class="columns">
                               <?php include('../uthsc-search-form.php'); ?>
                           </div>
                       </div>
                   </div><br />
                   <!--******************-->
                   <!--/UTHSC search form-->
                   <!--******************-->

               </div>
           </div>
           <!--/row-->

           <!--row-->
           <div class="row expanded">
               <div class="columns">

                   <!--********************-->
                   <!--UTHSC search results-->
                   <!--********************-->
                   <div class="row search-uthsc-results" style="display:none;">
                       <div class="columns large-6">
                           <ul class="tabs" data-tabs id="custom-search-tabs">
                               <li class="tabs-title is-active"><a href="#custom-search-results-campus" aria-selected="true">Campus</a></li>
                               <li class="tabs-title"><a href="#custom-search-results-system">System</a></li>
                           </ul>

                           <div class="tabs-content" data-tabs-content="custom-search-tabs">
                               <div class="tabs-panel is-active" id="custom-search-results-campus">

                                   <!--*********************-->
                                   <!--Campus Search Results-->
                                   <!--*********************-->
                                   <iframe class="uthsc-search-results"
                                           id="uthsc-campus-search"
                                           src="campus-search.html?q=<?php echo urlencode( $_GET["q"] ) ?>"
                                           scrolling="no">
                                   </iframe>
                                   <!--**********************-->
                                   <!--/Campus Search Results-->
                                   <!--**********************-->

                               </div>
                               <div class="tabs-panel" id="custom-search-results-system">

                                   <!--*********************-->
                                   <!--System Search Results-->
                                   <!--*********************-->
                                   <iframe class="uthsc-search-results"
                                           id="uthsc-system-search"
                                           src="system-search.html?q=<?php echo urlencode( $_GET["q"] ) ?>"
                                           scrolling="no">
                                   </iframe>
                                   <!--*********************-->
                                   <!--System Search Results-->
                                   <!--*********************-->

                               </div>
                           </div>
                       </div>

                       <div class="columns large-6">

                           <h2>People</h2>

                           <ul class="tabs" data-tabs id="people-search-tabs">
                               <li class="tabs-title is-active"><a href="#people-search-results-campus" aria-selected="true">Campus</a></li>
                               <li class="tabs-title"><a href="#people-search-results-system">System</a></li>
                           </ul>

                           <div class="tabs-content" data-tabs-content="people-search-tabs">
                               <div class="tabs-panel is-active" id="people-search-results-campus"></div>
                               <div class="tabs-panel" id="people-search-results-system"></div>
                           </div>

                           <div class="row">
                               <div class="columns">
                                   <small>Legal Disclaimer<br/>
                                       This directory is for official University use and also for communication of a
                                       personal nature between students, faculty, and staff listed herein. Use of this
                                       directory for any other purpose, including but not limited to reproduction and
                                       storage in a retreival system by any means, electronic or mechanical,
                                       photocopying or use of the addresses or other information contained in this
                                       directory for any mailing, is strictly prohibited.
                                   </small><br />
                               </div>
                           </div>
                       </div>
                   </div>
                   <!--*********************-->
                   <!--/UTHSC search results-->
                   <!--*********************-->

               </div>
           </div>
           <!--row-->

       </div>

       <!--******-->
       <!--Footer-->
       <!--******-->


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

           <div class="off-canvas-search">
               <?php include('../uthsc-search-form.php'); ?>
           </div>

           <!--  Close menu button-->
           <button class="uthsc-off-canvas-menu__close">
               <span aria-hidden="true" class="fa fa-chevron-left"></span>&emsp; Close Menu
           </button>
           <!--/ Close menu button-->

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

       <nav id="uthsc-off-canvas-menu--slide-right" class="uthsc-off-canvas-menu uthsc-off-canvas-menu--slide-right hide-for-print" aria-hidden="true">

           <div class="off-canvas-search">
               <?php include('../uthsc-search-form.php'); ?>
           </div>

           <!--  Close menu button-->
           <button class="uthsc-off-canvas-menu__close">
               Close Menu &emsp;<span aria-hidden="true" class="fa fa-chevron-right"></span>
           </button>
           <!--/ Close menu button-->


           <!--Mission links-->
           <div class="mission-links">
               <h2 class="link-heading">Mission</h2>

               <a href="/education/"><span aria-hidden="true" class="uthsc-fa-centered fa fa-graduation-cap"></span>&emsp;Academics</a>
               <a href="/redesign/research"><span aria-hidden="true" class="uthsc-fa-centered fa fa-flask"></span>&emsp;Research</a>
               <a href="/clinicalcare/"><span aria-hidden="true" class="uthsc-fa-centered fa fa-medkit"></span>&emsp;Clinical Care</a>
               <a href="/publicservice/"><span aria-hidden="true" class="uthsc-fa-centered fa fa-globe"></span>&emsp;Public Service</a>
           </div>

           <a href="/give/" class="call-to-action-link"><span aria-hidden="true" class="uthsc-fa-centered fa fa-gift"></span>&emsp;Make a Gift</a>
           <a href="/admissions/visit-uthsc.php" class="call-to-action-link"><span aria-hidden="true" class="uthsc-fa-centered fa fa-road"></span>&emsp;Take a Tour</a>

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
                       <li><a href="/map/">Maps</a></li>
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
           <button id="uthsc-off-canvas-button--slide-left" class="toggle-slide-left button" style="background-image: url('/-resources/2015/images/section-button-images/nav-toggler-left-home-page.png');"></button>
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
   <script src="../-resources/2015/js/uthsc-emergency-notification.min.js"></script>
   <script src="../-resources/2015/js/uthsc-search.min.js"></script>
   <script src="../-resources/2015/js/iframeResizer.min.js"></script>
   <script>iFrameResize()</script>
   <!--**************************-->
   <!--/Footcode for Search UTHSC-->
   <!--**************************-->
   </body>
</html>