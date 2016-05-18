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

    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="-resources/2015/css/uthsc.css">
    <link rel="stylesheet" href="-resources/2015/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,700,300italic,400">
    <?php
    function get_uthsc_instagram (
        $user_id='302960952',
        $access_token='302960952.a74da0d.1d808ab911114752b305e9877884d51c',
        $count='9'
    ){

        $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?access_token='.$access_token.'&count='.$count;

        // Cache the results
        $cache = './'.sha1($url).'.json';
        if(file_exists($cache) && filemtime($cache) > time() - 60*60){
            // If a cache file exists, and it is newer than 1 hour, use it
            $jsonData = json_decode(file_get_contents($cache));
        } else {
            $jsonData = json_decode((file_get_contents($url)));
            file_put_contents($cache,json_encode($jsonData));
        }

        foreach ($jsonData->data as $key=>$value) {
            $uthsc_feed .= "\t".'
                                    <div class="column">
                                        <a href="'.$value->link.'">
                                            <img class="thumbnail" src="'.$value->images->thumbnail->url.'" alt="'.$value->caption->text.'" title="'.$value->caption->text.'" />
                                        </a>
                                    </div>
                                '.PHP_EOL;
        }

        return $uthsc_feed;
    }
    ?>
</head>
<body class="homepage">

<!--***************************-->
<!--Facebook SDK for JavaScript-->
<!--***************************-->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : 'your-app-id',
            xfbml      : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--****************************-->
<!--/Facebook SDK for JavaScript-->
<!--****************************-->

<!--******************-->
<!--Google Tag Manager-->
<!--******************-->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PR6VFZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PR6VFZ');</script>
<!--*******************-->
<!--/Google Tag Manager-->
<!--*******************-->

<a href="#main-content" class="show-on-focus">Skip to content</a>

<!--******************-->
<!--Off canvas wrapper-->
<!--******************-->
<div id="uthsc-off-canvas-wrapper" class="uthsc-off-canvas-wrapper">

    <!--*****************-->
    <!--UTHSC site nav-->
    <!--*****************-->
    <nav class="uthsc-site-nav hide-for-print" aria-label="UTHSC site menu" role="navigation">
        <div class="uthsc-site-nav-left">
            <ul class="menu">
                <li><a href="/students/">Students</a></li>
                <li><a href="/faculty/">Faculty &amp; Staff</a></li>
                <li><a href="/alumni/">Alumni</a></li>
                <li><a href="/visitors/">Visitors</a></li>
                <li><a href="/clinicalcare/">Patients</a></li>
            </ul>
        </div>

        <div class="uthsc-site-nav-right">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="has-submenu">
                    <a href="#">Our Mission</a>
                    <ul class="submenu menu vertical" data-submenu>
                        <li>
                            <a href="/education/">
                                <span class="fa fa-graduation-cap"></span>
                                Academics
                            </a>
                        </li>
                        <li>
                            <a href="/research/">
                                <span class="fa fa-flask"></span>
                                Research
                            </a>
                        </li>
                        <li>
                            <a href="/clinicalcare/">
                                <span class="fa fa-medkit"></span>
                                Clinical Care
                            </a>
                        </li>
                        <li>
                            <a href="/publicservice/">
                                <span class="fa fa-globe"></span>
                                Public Service
                            </a>
                        </li>
                        <li>
                            <a href="/aboututhsc/utmission.php">
                                Mission Statement
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Resources</a>
                    <ul class="submenu menu vertical" data-submenu>
                        <li><a href="/banner/info/">Banner</a></li>
                        <li><a href="https://courses.uthsc.edu/">Blackboard</a></li>
                        <li><a href="http://events.uthsc.edu/">Calendar</a></li>
                        <li><a href="/hr/employment/">Career Opportunities</a></li>
                        <li><a href="/ilogin/">iLogin</a></li>
                        <li><a href="/map/">Maps</a></li>
                        <li><a href="https://utap.tennessee.edu/">MyUT</a></li>
                        <li><a href="https://news.uthsc.edu/">News</a></li>
                        <li><a href="/email/">Webmail</a></li>
                    </ul>
                </li>
                <li><a href="/give/"><span class="fa fa-gift"></span> Make a Gift</a></li>
                <li><a href="template.php"><span class="fa fa-road"></span> Take a Tour</a></li>
                <li>
                    <div class="show-for-large">
                        <!--Search form-->
                        <form class="input-group" aria-label="Search the UTHSC site"
                              action="/search/" method="get" style="margin-bottom:0;">
                            <input type="search" aria-label="Search the UTHSC site" role="search" name="s"
                                   placeholder="search" style="margin-right:0;">
                            <div class="input-group-button">
                                <button type="submit" class="button" aria-label="Submit search form">
                                    <span class="fa fa-search"></span>
                                </button>
                            </div>
                        </form>
                        <!--/Search form-->
                    </div>
                </li>
            </ul>
        </div>
    </nav>
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
                    <img src="-resources/2015/images/uthsc-logo-white-text.svg" alt="UTHSC logo" class="uthsc-logo"/>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="hide-for-large columns small-collapse">
                <!--Search form-->
                <form class="input-group" aria-label="Search the UTHSC site"
                      action="/search/" method="get" style="margin-bottom:0;">
                    <input type="search" aria-label="Search the UTHSC site" role="search" name="s"
                           placeholder="search" style="margin-right:0;">
                    <div class="input-group-button">
                        <button type="submit" class="button" aria-label="Submit search form">
                            <span class="fa fa-search"></span>
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
    <!--<div class="row expanded hide-for-print">-->
        <!--<div class="columns callout alert large-12" style="margin-bottom:0; padding:0;" data-closable>-->
            <!--<div class="row">-->
                <!--<h2>Emergency Notification!</h2>-->
                <!--<p>This section will be used for emergency notifications.</p>-->

                <!--<button class="close-button" aria-label="Dismiss alert" type="button" data-close>-->
                    <!--<span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <!--***********************-->
    <!--/Emergency Notification-->
    <!--***********************-->


    <!--*****************-->
    <!--UTHSC Section Nav-->
    <!--*****************-->
    <nav id="uthsc-section-navigation" data-equalizer="nested-links" aria-label="Current section menu"
         role="navigation" class="hide-for-print hide-class">
        <ul class="row collapse" data-equalizer="heading-links">

            <li class="uthsc-navigation-column small-2 columns">
                <a href="/education/" data-equalizer-watch="heading-links"><span class="fa fa-graduation-cap"></span> Academics</a>
            </li>

            <li class="uthsc-navigation-column small-2 columns">
                <a href="/research/" data-equalizer-watch="heading-links"><span class="fa fa-flask"></span> Research</a>
            </li>

            <li class="uthsc-navigation-column small-2 columns">
                <a href="/clinicalcare/" data-equalizer-watch="heading-links"><span class="fa fa-medkit"></span>Clinical Care</a>
            </li>

            <li class="uthsc-navigation-column small-2 columns">
                <a href="/publicservice/" data-equalizer-watch="heading-links"><span class="fa fa-globe"></span>Public Service</a>
            </li>

            <li class="uthsc-navigation-column small-2 columns">
                <a href="/aboututhsc/" data-equalizer-watch="heading-links"><span class="fa fa-file-text-o"></span>About UTHSC</a>
            </li>

            <li class="uthsc-navigation-column small-2 columns">
                <a href="http://uthscalumni.com/" data-equalizer-watch="heading-links"><span class="fa fa-users"></span>Alumni &amp; Friends</a>
            </li>

            <li class="uthsc-navigation-column small-2 columns"></li>
        </ul>
    </nav>
    <!--******************-->
    <!--/UTHSC Section Nav-->
    <!--******************-->


    <!--**********-->
    <!--Hero Image-->
    <!--**********-->
    <!--todo: fullscreen may be too broad of a class name and is likely to cause conflicts. -->
    <!--todo: If we aren't going to use magellan, is background image necessary instead of a regular hero-->
    <!--todo: move inline styles to scss-->

    <!--<div class="hero hero-one show-for-large hide-for-print"></div>-->
    <div class="fullscreen">
        <div class="row">
            <div class="columns small-11 medium-6 large-12 medium-uncentered small-centered uthsc-fullscreen-content">
                <p>Bringing the benefits of the health sciences to the
                    citizens of Tennessee and beyond through education,
                    research, clinical care, and public service.</p>
            </div>
            <div class="columns medium-6 large-12">
                <div class="row">
                    <div class="columns small-6 medium-12 large-4 large-push-2">
                        <a class="button secondary large expanded show-for-large"><span class="fa fa-road"></span> Take a Tour</a>
                        <a class="button secondary expanded show-for-medium-only"><span class="fa fa-road"></span> Take a Tour</a>
                        <a class="button secondary tiny expanded hide-for-medium"><span class="fa fa-road"></span> Take a Tour</a>
                    </div>
                    <div class="columns small-6 medium-12 large-4 large-pull-2">
                        <a class="button secondary large expanded show-for-large"><span class="fa fa-clock-o"></span> Schedule a Visit</a>
                        <a class="button secondary expanded show-for-medium-only"><span class="fa fa-clock-o"></span> Schedule a Visit</a>
                        <a class="button secondary tiny expanded hide-for-medium"><span class="fa fa-clock-o"></span> Schedule a Visit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--***********-->
    <!--/Hero Image-->
    <!--***********-->


    <!--*******-->
    <!--Content-->
    <!--*******-->
    <div class="main-content" id="main-content" aria-label="Page content" role="main">

        <!--Research anchor link-->
        <a id="about" style="margin-top:-75px; height:1px; width:1px; position:absolute;"></a>
        <!--/Research anchor link-->

        <!--todo: does this need to have the about class or should that be moved to something else-->
        <div class="content-area">

            <!--Infographics-->
            <div class="uthsc-infographics row text-center" data-equalizer="homepage-stats">
                <div data-equalizer-watch="homepage-stats" class="columns uthsc-infographic medium-3">
                    <h2>$2.7</h2>
                    <p>Billion</p>
                    <p>contributed to the<br><span class="uthsc-infographic-highlight">Tennessee economy</span></p>
                </div>

                <div data-equalizer-watch="homepage-stats" class="columns medium-6">
                    <div class="row uthsc-infographic tennessee">
                        <div class="columns medium-6">
                            <h2>4<span class="fa fa-map-marker"></span></h2>
                            <p>Campuses</p>
                            <p>
                                <a href="#">Memphis |</a>
                                <a href="#"> Knoxville |</a>
                                <a href="#"> Nashville |</a>
                                <a href="#"> Chattanooga</a>
                            </p>
                        </div>
                        <div class="columns medium-6">
                            <h2>100+</h2>
                            <p>Clinical &amp<br />Educational Sites</p>
                        </div>
                    </div>
                    <p><span class="uthsc-infographic-highlight" style="position: relative; top: -2.7rem;">Across Tennessee</span>
                </div>

                <div data-equalizer-watch="homepage-stats" class="columns medium-3 uthsc-infographic">
                    <h2>$200</h2>
                    <p>Million</p>
                    <p>in sponsored programs<br><span class="uthsc-infographic-highlight">in fiscal 2014</span></p>
                </div>
            </div>
            <!--/Infographics-->

            <!--Events-->
            <div id="events" class="row">
                <?php readfile("http://events.uthsc.edu/widgets/uthsc_homepage_2015.php"); ?>
            </div>
            <!--/Events-->


            <!--Blockquote-->
            <div class="row">
                <div class="columns small-centered small-12 medium-8 ">
                    <div class="row blockquote collapse">
                        <div class="columns small-2 medium-3">
                            <h2><span class="fa fa-4x fa-quote-left quotemark"></span></h2>
                        </div>
                        <div class="columns small-10 medium-9">
                            <blockquote>
                                <p>
                                    In five years, we're going to all be talking about what a wonderful job we did,
                                    patting ourselves on the back about what we did to take this community into the
                                    next millennium, or we could all be looking at each other ashamed of ourselves for
                                    squandering the opportunity that we had.
                                </p>
                                <cite>
                                    Ken Brown, executive vice chancellor and chief operations officer
                                </cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Blockquote-->

            <!--Hero Images for Mission Sets-->
            <div class="hide-for-small-only content-area">

                <!-- Academics-->

                <!--Academics anchor link-->
                <a id="academics" style="margin-top:-40px; height:1px; width:1px; position:absolute;"></a>
                <!--/Academics anchor link-->

                <div class="hero">
                    <img src="-resources/2015/images/mission-academics.jpg" alt="xxxx">
                </div>

                <div class="hero-name-stripe"></div>

                <div class="row">
                    <h2 class="hero-text">Academics</h2>

                    <div class="columns medium-3 news-box">
                        <div class="row">
                            <div class="columns small-11">
                                <h3>
                                    <span class="fa fa-newspaper-o"></span> News<br>
                                    <span class="news-box-for">for Academics</span>
                                </h3>
                            </div>
                            <div class="columns small-12 news-posts-academics">
                                <!--News Posts Academics Desktop-->
                            </div>
                        </div>
                    </div>

                    <div class="columns medium-9">

                        <div class="row">
                            <div class="columns medium-10 medium-centered">
                                <h3>Students</h3>
                                <div class="row">
                                    <div class="columns medium-4">
                                        <h4>Future</h4>
                                        <ul>
                                            <li><a href="/admissions/">Admissions</a></li>
                                            <li><a href="/admissions/application-deadlines.php">Application Deadlines</a></li>
                                            <li><a href="/admissions/degrees-offered.php">Degrees Offered</a></li>
                                            <li><a href="/finaid/">Financial Aid</a></li>
                                            <li><a href="/maps/">Maps and Directions</a></li>
                                            <li><a href="/international/">International Students</a></li>
                                            <li><a href="/futurestudents/">More...</a></li>
                                        </ul>
                                    </div>

                                    <div class="columns medium-4">
                                        <h4>Current</h4>
                                        <ul>
                                            <li><a href="/registrar/academic_calendar.php">Academic Calendar</a></li>
                                            <li><a href="/registrar/students.php#catalogs">Academic Catalog</a></li>
                                            <li><a href="/banner/">Banner Self-Service</a></li>
                                            <li><a href="/centerscope/">CenterScope</a></li>
                                            <li><a href="/oss/">One Stop Shop</a></li>
                                            <li><a href="/studentlife/">Student Life/SGAEC</a></li>
                                            <li><a href="/volshop/">VolShop</a></li>
                                            <li><a href="/registrar/">Registrar</a></li>
                                            <li><a href="/finance/bursar/">Bursar&rsquo;s Office</a></li>
                                            <li><a href="/students/">More...</a></li>
                                        </ul>
                                    </div>

                                    <div class="columns medium-4">
                                        <h4>Residents</h4>
                                        <ul>
                                            <li><a href="/GME/">Graduate Medical Education (GME)</a></li>
                                            <li><a href="/dentistry/Grad/programs.php">Dentistry</a></li>
                                            <li><a href="/pharmacy/dcp/residencyfellowship/cprp/">Pharmacy</a></li>
                                            <li><a href="/hospitals/">Affiliated Hospitals</a></li>
                                            <li><a href="/residency/">More...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Hero images for colleges-->
                <div id="colleges" class="hero callout">
                    <div class="row colleges">
                        <div class="columns">
                            <h2>Colleges</h2>
                        </div>


                        <!--Colleges block-grid-->
                        <div class="row small-up-2 medium-up-3">
                            <div class="column">
                                <a href="/dentistry/">
                                    <img src="-resources/2015/images/cod1.jpg" class="thumbnail" alt="College of Dentistry">
                                </a>
                            </div>
                            <div class="column">
                                <a href="/grad/">
                                    <img src="-resources/2015/images/cghs1.jpg" class="thumbnail" alt="College of Graduate Health Sciences">
                                </a>
                            </div>
                            <div class="column">
                                <a href="/health-professions/">
                                    <img src="-resources/2015/images/chp1.jpg" class="thumbnail" alt="College of Health Professions">
                                </a>
                            </div>
                            <div class="column">
                                <a href="/medicine/">
                                    <img src="-resources/2015/images/com1.jpg" class="thumbnail" alt="College of Medicine">
                                </a>
                            </div>
                            <div class="column">
                                <a href="/nursing/">
                                    <img src="-resources/2015/images/con1.jpg" class="thumbnail" alt="College of Nursing">
                                </a>
                            </div>
                            <div class="column">
                                <a href="/pharmacy/">
                                    <img src="-resources/2015/images/cop1.jpg" class="thumbnail" alt="College of Pharmacy">
                                </a>
                            </div>
                        </div>
                        <!--Colleges block-grid-->

                    </div>
                </div>
                <!--/Hero images for colleges-->
                <!--/Academics-->

                <!--Research-->

                <!--Research anchor link-->
                <a id="research" style="margin-top:-25px; height:1px; width:1px; position:absolute;"></a>
                <!--/Research anchor link-->

                <div class="hero">
                    <img src="-resources/2015/images/mission-research.jpg" alt="xxxx">
                </div>

                <div class="hero-name-stripe"></div>

                <div class="row">
                    <h2 class="hero-text">Research</h2>

                    <div class="columns medium-3 news-box">
                        <div class="row">
                            <div class="columns small-11">
                                <h3>
                                    <span class="fa fa-newspaper-o"></span> News<br>
                                    <span class="news-box-for">for Research</span>
                                </h3>
                            </div>
                            <div class="columns small-12 news-posts-research">
                                <!--News Posts Research Desktop-->
                            </div>
                        </div>
                    </div>

                    <div style="padding: 40vh 0;text-align: center;
                         margin-top: 15px;
                         background-image: url('-resources/2015/images/flask.png');
                         background-repeat: no-repeat;
                         background-size: 50%;background-position: 50%;"
                         class="columns medium-9 panel">
                        <p>Research specific content will be in this space.<br>
                            See the <a href="#academics">Academics</a> section for example.</p>
                    </div>
                </div>
                <!--/Research-->

                <!--Clinical Care-->

                <!--Clinical Care Anchor Link-->
                <a id="clinical-care" style="margin-top:-24px; height:1px; width:1px; position:absolute;"></a>
                <!--/Clinical Care Anchor Link-->

                <div class="hero">
                    <img src="-resources/2015/images/mission-clinical-care.jpg" alt="xxxx"/>
                </div>

                <div class="hero-name-stripe"></div>

                <div class="row">
                    <h2 class="hero-text">Clinical Care</h2>

                    <div class="columns medium-3 news-box">
                        <div class="row">
                            <div class="columns small-11">
                                <h3>
                                    <span class="fa fa-newspaper-o"></span> News<br>
                                    <span class="news-box-for">for Clinical Care</span>
                                </h3>
                            </div>
                            <div class="columns small-12 news-posts-clinical-care">
                                <!--News Posts Clinical Care Desktop-->
                            </div>
                        </div>
                    </div>
                    <div style="padding: 40vh 0;text-align: center;
                         margin-top: 15px;
                         background-image: url('-resources/2015/images/medkit.png');
                         background-repeat: no-repeat;background-size: 50%;
                         background-position: 50%;"
                         class="columns medium-9 panel">
                        <p>Clinical Care specific content will be in this space.<br>
                            See the<a href="#academics"> Academics</a> section for example.</p>
                    </div>
                </div>
                <!--/Clinical Care-->

                <!--Public Service-->

                <!--Public Service Anchor Link-->
                <a id="public-service" style="margin-top:-24px; height:1px; width:1px; position:absolute;"></a>
                <!--/Public Service Anchor Link-->

                <!--todo: Alt tag is just xxxx-->
                <div class="hero">
                    <img src="-resources/2015/images/mission-public-service.jpg" alt="xxxx"/>
                </div>

                <div class="hero-name-stripe"></div>

                <div class="row">
                    <h2 class="hero-text">Public Service</h2>

                    <div class="columns medium-3 news-box">
                        <div class="row">
                            <div class="columns small-11">
                                <h3>
                                    <span class="fa fa-newspaper-o"></span> News<br>
                                    <span class="news-box-for">for Public Service</span>
                                </h3>
                            </div>
                            <div class="columns small-12 news-posts-public-service">
                                <!--News Posts Public Service Desktop-->
                            </div>
                        </div>
                    </div>

                    <div style="padding: 40vh 0;
                         text-align: center;
                         margin-top: 15px;
                         background-image: url('-resources/2015/images/globe.png');
                         background-repeat: no-repeat;
                         background-size: 50%;
                         background-position: 50%;"
                         class="columns medium-9 panel">
                        <p>Public Service specific content will be in this space.<br>
                            See the<a href="#academics"> Academics</a> section for example.</p>
                    </div>
                </div>
                <!--/Public Service-->

            </div>
            <!--/Hero Images for Mission Sets-->

            <hr />

            <!--Social-->
            <!--todo: Consider using more specific name than social-row and class instead of id-->
            <div id="social-row" data-equalizer="homepage-social" class="row collapse text-center">

                <div class="columns medium-6 large-4 social-site">
                    <h5><span class="fa fa-facebook fa-2x"> Facebook</span></h5>
                    <div data-href="https://www.facebook.com/uthsc"
                         data-width="300"
                         data-height="680"
                         data-hide-cover="true"
                         data-show-facepile="false"
                         data-show-posts="true"
                         data-equalizer-watch="homepage-social"
                         class="fb-page"
                         data-small-header="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/uthsc">
                                <a href="https://www.facebook.com/uthsc">University of Tennessee Health Science Center</a>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="columns medium-6 large-4 social-site">
                    <h5><span class="fa fa-twitter fa-2x"> Twitter</span></h5>
                    <a data-dnt="true"
                       href="https://twitter.com/uthsc"
                       data-widget-id="614465323593539584"
                       data-equalizer-watch="homepage-social"
                       class="twitter-timeline"
                       data-chrome="noheader noborders nofooter noscrollbar"
                       width="300"
                       height="680"
                       data-aria-polite="assertive">
                        Tweets by @uthsc
                        <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
                        </script>
                    </a>
                </div>

                <div class="columns large-4 social-site">
                    <h5><span class="fa fa-instagram fa-2x"> Instagram</span></h5>
                    <div id="uthsc-instagram" class="row small-up-3 medium-up-4 large-up-2">
                        <?php echo get_uthsc_instagram(); ?>
                    </div>
                </div>
            </div>
            <!--/Social-->
        </div>

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
        <p><small>Last Published: February 1, 2016</small></p>
    </div>
    <!--***************-->
    <!--/Last Published-->
    <!--***************-->


    <!--*************-->
    <!--Global Footer-->
    <!--*************-->
    <footer aria-label="UTHSC contact information and links" role="contentinfo" class="uthsc-global-footer">

        <!--************-->
        <!--Contact Info-->
        <!--************-->
        <div class="row">
            <div class="columns text-center uthsc-copy-block" aria-label="UTHSC contact information">
                <p>
                    &copy; 2016
                    The University of Tennessee<br />
                    Health Science Center<br />
                    Memphis, Tennessee 38163<br />
                    Main: (901) 448-5500<br />
                    TDD: (901) 448-7382
                </p>
            </div>
        </div>
        <!--*************-->
        <!--/Contact Info-->
        <!--*************-->

        <div class="row hide-for-print">

            <!--***************-->
            <!--Email Webmaster-->
            <!--***************-->
            <div class="columns medium-3 medium-push-3">
                <a href="mailto:webmaster@uthsc.edu" class="button expanded uthsc-footer-button">
                    <div class="row collapse">
                        <div class="columns small-5 text-right">
                            <p><span class="fa fa-envelope fa-3x"></span>&emsp;</p>
                        </div>
                        <div class="columns small-7 text-left">
                            <p>
                                Email<br />
                                Webmaster
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <!--****************-->
            <!--/Email Webmaster-->
            <!--****************-->

            <!--*************-->
            <!--Edit Password-->
            <!--*************-->
            <div class="columns medium-3 medium-pull-3">
                <a href="/password/" class="button expanded uthsc-footer-button">
                    <div class="row collapse">
                        <div class="columns small-5 text-right">
                            <p><span class="fa fa-key fa-3x"></span>&emsp;</p>
                        </div>
                        <div class="columns small-7 text-left">
                            <p>
                                Edit<br />
                                Password
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <!--**************-->
            <!--/Edit Password-->
            <!--**************-->

        </div>

        <!--******************-->
        <!--Social Media Links-->
        <!--******************-->
        <div class="row hide-for-print">
            <div class="columns text-center uthsc-social-icons" aria-label="UTHSC on social media">
                <a href="https://facebook.com/uthsc" aria-label="facebook">
                    <span class="fa fa-facebook fa-2x fa-inverse"></span>
                    <span class="show-for-sr">facebook</span>
                </a>
                <a href="https://twitter.com/uthsc" aria-label="twitter">
                    <span class="fa fa-twitter fa-2x fa-inverse"></span>
                    <span class="show-for-sr">twitter</span>
                </a>
                <a href="https://instagram.com/uthsc" aria-label="instagram">
                    <span class="fa fa-instagram fa-2x fa-inverse"></span>
                    <span class="show-for-sr">instagram</span>
                </a>
                <a href="https://linkedin.com/company/university-of-tennessee-health-science-center"
                   aria-label="linked in">
                    <span class="fa fa-linkedin fa-2x fa-inverse"></span>
                    <span class="show-for-sr">linked in</span>
                </a>
                <a href="https://youtube.com/user/uthsc" aria-label="youtube">
                    <span class="fa fa-youtube fa-2x fa-inverse"></span>
                    <span class="show-for-sr">You-tube</span>
                </a>
                <a href="https://pinterest.com/uthsc/" aria-label="pinterest">
                    <span class="fa fa-pinterest fa-2x fa-inverse"></span>
                    <span class="show-for-sr">pinterest</span>
                </a>
            </div>
        </div>
        <!--*******************-->
        <!--/Social Media Links-->
        <!--*******************-->

        <!--***********************-->
        <!--Emergency Numbers Links-->
        <!--***********************-->
        <div aria-label="Emergency contact information" class="row collapse hide-for-print" role="complementary">

            <!--Desktop Emergency Numbers Link-->
            <div class="row collapse show-for-medium">
                <div id="uthsc-emergency-desktop" class="medium-5 medium-centered columns">
                    <a href="/univheal/emergencies.php" class="alert button expanded">
                        <div class="row">
                            <div class="columns large-5 medium-4 text-right">
                                <span class="fa fa-phone fa-flip-horizontal fa-3x"></span>
                            </div>

                            <div class="columns large-7 medium-8 text-left">
                                <h2>Emergency<br />Numbers</h2>
                            </div>

                            <div class="columns">
                                Call 911 or Campus Police at (901) 448-4444<br /> More Emergency Information
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!--/Desktop Emergency Numbers Link-->

            <!--Mobile Emergency Numbers Links-->
            <div id="uthsc-emergency-mobile" class="columns hide-for-medium">
                <h2 class="text-center">
                    <span class="fa fa-phone fa-flip-horizontal fa-2x"></span>&emsp;
                    Emergency Numbers
                </h2>

                <ul class="accordion emergency-contact" role="tablist"
                    data-accordion="data-accordion" data-allow-all-closed="true">

                    <!--******************-->
                    <!--Medical/Behavioral-->
                    <!--******************-->

                    <li class="accordion-item">
                        <!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
                        <a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading"
                           aria-controls="panel1d">
                            <span class="fa fa-info-circle"></span> Medical/Behavioral
                        </a>

                        <!-- The content pane needs an ID that matches the above href, role="tabpanel",
                        data-tab-content, and aria-labelledby. -->
                        <div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content="data-tab-content"
                             aria-labelledby="panel1d-heading">

                            <a href="tel:911" class="button expanded"
                               aria-label="Call police at 911">
                                <span class="fa fa-phone fa-2x fa-flip-horizontal"></span>
                                &emsp;911
                            </a>

                            <p>or Campus Police at</p>

                            <a href="tel:901-448-4444" class="button expanded"
                               aria-label="Call campus police at 901-448-4444">
                                <span class="fa fa-phone fa-2x fa-flip-horizontal"></span>
                                &emsp;(901) 448-4444
                            </a>
                        </div>
                    </li>
                    <!--*******************-->
                    <!--/Medical/Behavioral-->
                    <!--*******************-->

                    <!--*******************-->
                    <!--Medical Urgent Care-->
                    <!--*******************-->
                    <li class="accordion-item ">
                        <!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
                        <a href="#panel2d" role="tab" class="accordion-title" id="panel2d-heading"
                           aria-controls="panel2d">
                            <span class="fa fa-info-circle"></span> Medical Urgent Care
                        </a>

                        <!-- The content pane needs an ID that matches the above href, role="tabpanel",
                        data-tab-content, and aria-labelledby. -->
                        <div id="panel2d" class="accordion-content" role="tabpanel" data-tab-content="data-tab-content"
                             aria-labelledby="panel2d-heading">
                            <a href="tel:901-448-5630" class="button expanded"
                               aria-label="Call medical urgent care at 901-448-5630">
                                <span class="fa fa-phone fa-2x fa-flip-horizontal"></span>
                                &emsp;(901) 448-5630
                            </a>
                        </div>
                    </li>
                    <!--********************-->
                    <!--/Medical Urgent Care-->
                    <!--********************-->

                    <!--*****************************-->
                    <!--Behavioral Health Urgent Care-->
                    <!--*****************************-->
                    <li class="accordion-item ">
                        <!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
                        <a href="#panel3d" role="tab" class="accordion-title" id="panel3d-heading"
                           aria-controls="panel3d">
                            <span class="fa fa-info-circle"></span> Behavioral Health Urgent Care
                        </a>

                        <!-- The content pane needs an ID that matches the above href, role="tabpanel",
                        data-tab-content, and aria-labelledby. -->
                        <div id="panel3d" class="accordion-content" role="tabpanel" data-tab-content="data-tab-content"
                             aria-labelledby="panel2d-heading">
                            <a href="tel:901-448-5064" class="button expanded"
                               aria-label="Call behavioral health urgent care at 901-448-448-5064">
                                <span class="fa fa-phone fa-2x fa-flip-horizontal"></span>
                                &emsp;(901) 448-5064
                            </a>
                        </div>
                    </li>
                    <!--******************************-->
                    <!--/Behavioral Health Urgent Care-->
                    <!--******************************-->

                    <!--**************************-->
                    <!--Student Assistance Program-->
                    <!--**************************-->
                    <li class="accordion-item ">
                        <!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
                        <a href="#panel4d" role="tab" class="accordion-title" id="panel4d-heading"
                           aria-controls="panel4d">
                            <span class="fa fa-info-circle"></span> Student Assistance Program
                        </a>

                        <!-- The content pane needs an ID that matches the above href, role="tabpanel",
                        data-tab-content, and aria-labelledby. -->
                        <div id="panel4d" class="accordion-content" role="tabpanel" data-tab-content="data-tab-content"
                             aria-labelledby="panel4d-heading">

                            <a href="tel:800-327-2255" class="button expanded"
                               aria-label="Call student assistance program at 800-327-2255">
                                <span class="fa fa-phone fa-2x fa-flip-horizontal"></span>
                                &emsp;(800) 327-2255<br />
                                (Option 3)
                            </a>
                        </div>
                    </li>
                    <!--***************************-->
                    <!--/Student Assistance Program-->
                    <!--***************************-->

                    <!--***************************-->
                    <!--Employee Assistance Program-->
                    <!--***************************-->
                    <li class="accordion-item ">
                        <!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
                        <a href="#panel5d" role="tab" class="accordion-title" id="panel5d-heading"
                           aria-controls="panel5d">
                            <span class="fa fa-info-circle"></span> Employee Assistance Program
                        </a>

                        <!-- The content pane needs an ID that matches the above href, role="tabpanel",
                        data-tab-content, and aria-labelledby. -->
                        <div id="panel5d" class="accordion-content" role="tabpanel" data-tab-content="data-tab-content"
                             aria-labelledby="panel5d-heading">

                            <a href="tel:855-437-3486" class="button expanded"
                               aria-label="Call employee assistance program at 855-437-3486">
                                <span class="fa fa-phone fa-2x fa-flip-horizontal"></span>
                                &emsp;(855) 437-3486
                            </a>
                        </div>
                    </li>
                    <!--****************************-->
                    <!--/Employee Assistance Program-->
                    <!--****************************-->

                    <!--******************************-->
                    <!--After Hours Medical/Behavioral-->
                    <!--******************************-->
                    <li class="accordion-item ">
                        <!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
                        <a href="#panel6d" role="tab" class="accordion-title" id="panel6d-heading"
                           aria-controls="panel6d">
                            <span class="fa fa-info-circle"></span> After Hours Medical/Behavioral
                        </a>

                        <!-- The content pane needs an ID that matches the above href, role="tabpanel",
                        data-tab-content, and aria-labelledby. -->
                        <div id="panel6d" class="accordion-content" role="tabpanel" data-tab-content="data-tab-content"
                             aria-labelledby="panel6d-heading">

                            <a href="tel:901-541-5654" class="button expanded"
                               aria-label="Call after hours medical behavioral at 901-541-5654">
                                <span class="fa fa-phone fa-2x fa-flip-horizontal"></span>
                                &emsp;(901) 541-5654
                            </a>
                        </div>
                    </li>
                    <!--*******************************-->
                    <!--/After Hours Medical/Behavioral-->
                    <!--*******************************-->

                </ul>
            </div>
            <!--/Mobile Emergency Numbers Links-->

        </div>
        <!--************************-->
        <!--/Emergency Numbers Links-->
        <!--************************-->

    </footer>
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
        <a href="index.php" class="button home-button"><span class="fa fa-home"></span></a>
        <button class="button breadcrumbs-button dropdown" type="button" data-toggle="left-breadcrumbs-dropdown">
            Breadcrumbs Back Home
        </button>
        <div class="dropdown-pane bottom" id="left-breadcrumbs-dropdown" data-dropdown="data-dropdown"
             data-v-offset="0" data-auto-focus="true">
            <ul class="uthsc-off-canvas-breadcrumbs-list">
                <li><a href="index.php" title="Home">Back to the Homepage</a></li>
                <li><a href="#" title="College of Medicine">College of Medicine</a></li>
                <li><a href="#" title="Office of Medical Education">Office of Medical Education</a></li>
                <li><a href="#" title="Clerkships">Clerkships</a></li>
                <li><a href="#" title="Core Clerkship Directors">Core Clerkship Directors</a></li>
                <li class="disabled"><strong>Current Page</strong></li>
            </ul>
        </div>
    </div>

    <div class="off-canvas-search">
        <!--Search form-->
        <form class="input-group" aria-label="Search the UTHSC site"
              action="/search/" method="get" style="margin-bottom:0;">
            <input type="search" aria-label="Search the UTHSC site" role="search" name="s"
                   placeholder="search" style="margin-right:0;">
            <div class="input-group-button">
                <button type="submit" class="button" aria-label="Submit search form">
                    <span class="fa fa-search"></span>
                </button>
            </div>
        </form>
        <!--/Search form-->
    </div>

    <!--Close menu button-->
    <button class="uthsc-off-canvas-menu__close">
        <span class="fa fa-chevron-left"></span>&emsp; Close Menu
    </button>

    <ul>
        <li><a href="#" class="link-heading">Menu Dropdown One</a>
            <ul>
                <li><a href="#">First Item in Dropdown</a></li>
                <li><a href="#">Second Item in Dropdown</a></li>
                <li><a href="#">Third Item in Dropdown</a></li>
                <li><a href="#">Fourth Item in Dropdown</a></li>
                <li><a href="#">Fifth Item in Dropdown</a></li>
            </ul>
        </li>
        <li><a href="#" class="link-heading">Menu Dropdown Two</a>
            <ul>
                <li><a href="#">First Item in Dropdown</a></li>
                <li><a href="#">Second Item in Dropdown</a></li>
                <li><a href="#">Third Item in Dropdown That Goes to Two Lines</a></li>
                <li><a href="#">Fourth Item in Dropdown</a></li>
            </ul>
        </li>
        <li><a href="#" class="link-heading">Menu Dropdown Three</a>
            <ul>
                <li><a href="#">First Item in Dropdown</a></li>
                <li><a href="#">Second Item in Dropdown</a></li>
                <li><a href="#">Third Item in Dropdown</a></li>
                <li><a href="#">Fourth Item in Dropdown</a></li>
                <li><a href="#">Fifth Item in Dropdown</a></li>
                <li><a href="#">Sixth Item in Dropdown</a></li>
                <li><a href="#">Seventh Item in Dropdown</a></li>
                <li><a href="#">Eighth Item in Dropdown</a></li>
                <li><a href="#">Ninth Item in Dropdown</a></li>
                <li><a href="#">Tenth Item in Dropdown</a></li>
                <li><a href="#">Eleventh Item in Dropdown</a></li>
            </ul>
        </li>
        <li><a href="#" class="link-heading">Menu Dropdown Four</a>
            <ul>
                <li><a href="#">First Item in Dropdown</a></li>
                <li><a href="#">Second Item in Dropdown</a></li>
                <li><a href="#">Third Item in Dropdown</a></li>
                <li><a href="#">Fourth Item in Dropdown</a></li>
                <li><a href="#">Fifth Item in Dropdown</a></li>
                <li><a href="#">Sixth Item in Dropdown</a></li>
                <li><a href="#">Seventh Item in Dropdown</a></li>
            </ul>
        </li>
        <li><a href="#" class="link-heading">Menu Dropdown Five</a>
            <ul>
                <li><a href="#">First Item in Dropdown</a></li>
            </ul>
        </li>
        <li><a href="#" class="link-heading">Menu Dropdown Six</a>
            <ul>
                <li><a href="#">First Item in Dropdown</a></li>
                <li><a href="#">Second Item in Dropdown</a></li>
                <li><a href="#">Third Item in Dropdown</a></li>
                <li><a href="#">Fourth Item in Dropdown</a></li>
                <li><a href="#">Fifth Item in Dropdown That Goes to Three Lines Because it Is Very Long</a></li>
                <li><a href="#">Sixth Item in Dropdown</a></li>
                <li><a href="#">Seventh Item in Dropdown</a></li>
                <li><a href="#">Eighth Item in Dropdown</a></li>
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
        <a href="index.php" class="button home-button"><span class="fa fa-home"></span></a>
        <button class="button breadcrumbs-button dropdown" type="button" data-toggle="right-breadcrumbs-dropdown">
            Breadcrumbs Back Home
        </button>
        <div class="dropdown-pane bottom" id="right-breadcrumbs-dropdown" data-dropdown="data-dropdown"
             data-v-offset="0" data-auto-focus="true">
            <ul class="uthsc-off-canvas-breadcrumbs-list">
                <li><a href="index.php" title="Home">Back to the Homepage</a></li>
                <li><a href="#" title="College of Medicine">College of Medicine</a></li>
                <li><a href="#" title="Office of Medical Education">Office of Medical Education</a></li>
                <li><a href="#" title="Clerkships">Clerkships</a></li>
                <li><a href="#" title="Core Clerkship Directors">Core Clerkship Directors</a></li>
                <li class="disabled"><strong>Current Page</strong></li>
            </ul>
        </div>
    </div>

    <div class="off-canvas-search">
        <!--Search form-->
        <form class="input-group" aria-label="Search the UTHSC site"
              action="/search/" method="get" style="margin-bottom:0;">
            <input type="search" aria-label="Search the UTHSC site" role="search" name="s"
                   placeholder="search" style="margin-right:0;">
            <div class="input-group-button">
                <button type="submit" class="button" aria-label="Submit search form">
                    <span class="fa fa-search"></span>
                </button>
            </div>
        </form>
        <!--/Search form-->
    </div>

    <!--Close menu button-->
    <button class="uthsc-off-canvas-menu__close">
        Close Menu &emsp;<span class="fa fa-chevron-right"></span>
    </button>

    <!--Mission links-->
    <div class="mission-links">
        <h2 class="link-heading">Mission</h2>

        <a href="/education/"><span class="uthsc-fa-centered fa fa-graduation-cap"></span>&emsp;Academics</a>
        <a href="/research/"><span class="uthsc-fa-centered fa fa-flask"></span>&emsp;Research</a>
        <a href="/clinicalcare/"><span class="uthsc-fa-centered fa fa-medkit"></span>&emsp;Clinical Care</a>
        <a href="/publicservice/"><span class="uthsc-fa-centered fa fa-globe"></span>&emsp;Public Service</a>
        <a href="/aboututhsc/"><span class="uthsc-fa-centered fa fa-file-text-o"></span>&emsp;About UTHSC</a>
        <a href="http://uthscalumni.com/"><span class="uthsc-fa-centered fa fa-users"></span>&emsp;Alumni &amp; Friends</a>
    </div>

    <a href="#" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-gift"></span>&emsp;Make a Gift</a>
    <a href="template.php" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-road"></span>&emsp;Take a Tour</a>

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
    <button id="uthsc-off-canvas-button--slide-left" class="toggle-slide-left button"></button>
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
<script src="-resources/2015/js/jquery.min.js"></script>
<script src="-resources/2015/js/what-input.min.js"></script>
<script src="-resources/2015/js/foundation.min.js"></script>
<script src="-resources/2015/js/uthsc.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLV5PU6hBErfU5GOc9Jy4-6bWud2iaVj8&callback=initMap">
</script>
<!--instagram count fix-->
<script>
    $('#uthsc-instagram').find(':nth-child(9)').addClass("show-for-small-only")
</script>
<!--/instagram count fix-->
<!--********-->
<!--/Scripts-->
<!--********-->

</body>
</html>