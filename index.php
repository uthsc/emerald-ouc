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
    <link rel="stylesheet" href="/-resources/2015/css/uthsc.css">
    <link rel="stylesheet" href="/-resources/2015/css/font-awesome.min.css">
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
                            <a href="/redesign/research/">
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
                <a href="/redesign">
                    <img src="/-resources/2015/images/uthsc-logo-white-text.svg" alt="UTHSC logo" class="uthsc-logo"/>
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
                <a href="/redesign/research/" data-equalizer-watch="heading-links"><span class="fa fa-flask"></span> Research</a>
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
                    research, clinical care and public service.</p>
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

        <!--todo: does this need to have the about class or should that be moved to something else-->
        <div class="content-area">
            <!-- Program Explorer-->
            <div class="row uthsc-program-explorer uthsc-row-space">
                <div class="columns medium-8">
                    <div class="row uthsc-program-explorer-tabs">
                        <div class="columns uthsc-program-explorer-heading text-center">
                            <h2>Program Explorer</h2>
                            <h2 class="subheader">Discover all that UTHSC has to offer</h2>
                        </div>
                        <div class="row collapse">
                            <div class="medium-7 large-5 columns">
                                <ul class="tabs vertical" id="example-vert-tabs" data-tabs="data-tabs">
                                    <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">Dentistry</a></li>
                                    <li class="tabs-title"><a href="#panel2v">Graduate Health Sciences</a></li>
                                    <li class="tabs-title"><a href="#panel3v">Health Professions</a></li>
                                    <li class="tabs-title"><a href="#panel4v">Medicine</a></li>
                                    <li class="tabs-title"><a href="#panel5v">Nursing</a></li>
                                    <li class="tabs-title"><a href="#panel6v">Pharmacy</a></li>
                                </ul>
                            </div>
                            <div class="medium-5 large-7 columns uthsc-program-explorer-content">
                                <div class="tabs-content vertical" data-tabs-content="example-vert-tabs">
                                    <div class="tabs-panel is-active" id="panel1v">
                                        <ul>
                                            <li>
                                                <a href="/dentistry/">College of Dentistry</a>
                                                <ul>
                                                    <li><a href="/dentistry/Fac_Depts/bidx.php">Diagnostic Sciences &amp; Oral Medicine</a></li>
                                                    <li><a href="/dentistry/omds/">Oral and Maxillofacial Diagnostic Services</a></li>
                                                    <li><a href="/dentistry/dental-hygiene/">Dental Hygiene, Entry Level (B.S. Degree)</a></li>
                                                    <li><a href="/dentistry/dental-hygiene/masters/index.php">Dental Hygiene, Graduate Program (MDH Degree)</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/endo.php">Endodontics</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/general-practice-staff.php">General Practice</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/oms.php">Oral &amp; Maxillofacial Surgery</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/ortho.php">Orthodontics</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/pedocoh.php">Pediatric Dentistry &amp; Community Oral Health</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/perio.php">Periodontology</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/rest.php">Prosthodontics</a></li>
                                                    <li><a href="/dentistry/research/">Bioscience Research</a></li>
                                                    <li><a href="/dentistry/Fac_Depts/newrest.php">Restorative</a></li>
                                                </ul>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="tabs-panel" id="panel2v">
                                        <ul>
                                            <li>
                                                <a href="/grad/">College of Graduate Health Sciences</a>
                                                <ul>
                                                    <li><a href="/grad/Programs/index.php?page=BIOM">Biomedical Engineering and Imaging</a></li>
                                                    <li><a href="/grad/Programs/index.php?page=DSCI">Dental Science (Masters only)</a>
                                                    </li>
                                                    <li><a href="/grad/Programs/index.php?page=BIOE">Epidemiology (Masters only)</a>
                                                    </li>
                                                    <li><a href="/grad/Programs/index.php?page=HOPR">Health Outcomes and Policy Research</a></li>
                                                    <li><a href="/grad/PROGRAMS/BCLRMMO.php">Biomedical Sciences (Masters only)</a>
                                                    </li>
                                                    <li><a href="/grad/IBS/">Integrated Program in Biomedical Sciences (PhD only)</a>
                                                    </li>
                                                    <li><a href="/grad/Programs/index.php?page=NSG">Nursing</a></li>
                                                    <li><a href="/grad/Programs/index.php?page=PharmSci">Pharmaceutical Sciences</a></li>
                                                    <li><a href="/grad/Programs/index.php?page=PharmacologyMS">Pharmacology (Masters only)</a>
                                                    </li>
                                                    <li><a href="/health-professions/asp/phd/index.php">Speech and Hearing Science</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tabs-panel" id="panel3v">
                                        <ul>
                                            <li>
                                                <a href="/health-professions/">College of Health Professions</a>
                                                <ul>
                                                    <li><a href="/health-professions/asp/index.php">Audiology &amp; Speech Pathology</a></li>
                                                    <li><a href="/health-professions/cls/index.php">Clinical Laboratory Sciences</a></li>
                                                    <li><a href="/health-professions/cls/ct/index.php">Cytotechnology &amp; Histotechnology </a></li>
                                                    <li><a href="/health-professions/him/index.php">Health Informatics &amp; Information Management</a></li>
                                                    <li><a href="/health-professions/cls/mls/index.php">Medical Laboratory Science</a></li>
                                                    <li><a href="/health-professions/ot/index.php">Occupational Therapy</a></li>
                                                    <li><a href="/health-professions/pa/index.php">Physician Assistant</a></li>
                                                    <li><a href="/health-professions/pt/index.php">Physical Therapy, Entry Level (DPT Degree)</a></li>
                                                    <li><a href="/health-professions/pt/programs/pt-graduate/index.php">Physical Therapy, Graduate Program (MSPT Degree)</a></li>
                                                    <li><a href="/health-professions/pt/programs/pt-graduate/index.php">Physical Therapy, Graduate Program (ScDPT Degree)</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tabs-panel" id="panel4v">
                                        <ul>
                                            <li>
                                                <a href="/medicine/">College of Medicine</a>
                                                <ul>
                                                    <li><a href="/anatomy-neurobiology/">Anatomy &amp; Neurobiology</a></li>
                                                    <li><a href="/anesthesiology/">Anesthesiology</a></li>
                                                    <li><a href="/compmed/">Comparative Medicine</a></li>
                                                    <li><a href="/dermatology/">Dermatology</a></li>
                                                    <li><a href="/fammed/">Family Medicine</a></li>
                                                    <li><a href="/internalmedicine/">Medicine</a></li>
                                                    <li><a href="/molecular_sciences/">Microbiology, Immunology and Biochemistry</a></li>
                                                    <li><a href="/neurology/">Neurology</a></li>
                                                    <li><a href="/neurosurgery/">Neurosurgery</a></li>
                                                    <li><a href="/obgyn/">Obstetrics and Gynecology</a></li>
                                                    <li><a href="/eye/">Ophthalmology</a></li>
                                                    <li><a href="/ortho/">Orthopaedic Surgery &amp; Biomedical Engineering</a></li>
                                                    <li><a href="/otolaryngology/">Otolaryngology - Head and Neck Surgery</a></li>
                                                    <li><a href="/pathology/">Pathology and Laboratory Medicine</a></li>
                                                    <li><a href="/pediatrics/">Pediatrics</a></li>
                                                    <li><a href="/pharmacology/">Pharmacology</a></li>
                                                    <li><a href="/physiology/">Physiology</a></li>
                                                    <li><a href="/plasticsurgery/">Plastic Surgery</a></li>
                                                    <li><a href="/prevmed/">Preventive Medicine</a></li>
                                                    <li><a href="/psych/">Psychiatry</a></li>
                                                    <li><a href="/radiology/">Radiology</a></li>
                                                    <li><a href="/surgery/">Surgery</a></li>
                                                    <li><a href="/urology/">Urology</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tabs-panel" id="panel5v">
                                        <ul>
                                            <li>
                                                <a href="/redesign/nursing">College of Nursing</a>
                                                <ul>
                                                    <li><a href="/nursing/academic-programs/index.php">Academic Programs</a></li>
                                                    <li><a href="/nursing/continuing-education/index.php">Continuing Education</a></li>
                                                    <li><a href="/nursing/practice-programs/index.php">Practice Programs</a></li>
                                                    <li><a href="/nursing/research-programs/index.php">Research Programs</a></li>
                                                    <li><a href="/nursing/academic-programs/BSN/index.php">Bachelor of Science in Nursing (BSN)</a></li>
                                                    <li><a href="/nursing/academic-programs/MSN/index.php">Clinical Nurse Leader (CNL)</a></li>
                                                    <li><a href="/nursing/academic-programs/DNP/index.php">Doctor of Nursing Practice (DNP)</a></li>
                                                    <li><a href="/nursing/academic-programs/DNP/nurse_anesthesia/index.php">Nurse Anesthesia (DNP)</a></li>
                                                    <li><a href="/nursing/academic-programs/PhD/index.php">Doctor of Philosophy (PhD)</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tabs-panel" id="panel6v">
                                        <ul>
                                            <li>
                                                <a href="/pharmacy/">College of Pharmacy</a>
                                                <ul>
                                                    <li><a href="/pharmacy/dcp/">Department of Clinical Pharmacy</a></li>
                                                    <li><a href="/pharmacy/pharmsci/">Department of Pharmaceutical Sciences</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns medium-4 uthsc-did-you-know text-center">
                    <h2><span class="fa fa-lightbulb-o"></span> Did you know...</h2>
                    <p>UTHSC is ranked</p>
                    <p class="uthsc-did-you-know-number"><sup>#</sup>17</p>
                    <p>nationally among US pharmacy schools</p>
                </div>
            </div>
            <!--/Program Explorer-->

            <!--  People Search-->
            <div class="row uthsc-people-search uthsc-row-space">
                <div class="columns callout">
                    <!--Search form-->
                    <div class="input-group">
                        <input class="input-group-field" type="text" placeholder="Search ...">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Submit">
                        </div>
                    </div>
                    <!--/Search form-->
                </div>
            </div>
            <!--/ People Search-->

            <!--  Mission Row-->
            <div class="row uthsc-row-space medium-up-2 large-up-4">
                <div class="columns">
                    <img src="/-resources/2015/images/mission-academics.jpg" class="uthsc-mission-image">
                    <h2>Academics</h2>
                    <p>Since 1911, we have been training health care professionals through education, research, clinical care and public service. Today, our Colleges of Dentistry, Graduate Health Sciences, Health Professions , Medicine, Nursing and Pharmacy serve more than 3,000 students and 1,300 residents, post docs and fellows across four campuses.</p>
                    <ul>
                        <li><a href="/admissions/">Admissions</a></li>
                        <li><a href="/registrar/academic_calendar.php">Academic Calendar</a></li>
                        <li><a href="/registrar/">Registrar</a></li>
                        <li><a href="/residency/">Residencies and Fellowships</a></li>
                    </ul>
                    <hr />
                    <a class="button hollow small" href="/education/"><span class="fa fa-plus-circle"></span> Learn More...</a>
                </div>
                <div class="columns">
                    <img src="/-resources/2015/images/mission-research-homepage.jpg" class="uthsc-mission-image">
                    <h2>Research</h2>
                    <p>UTHSC has a long and rich tradition of accomplishments in basic, clinical and translational research in a wide variety of disciplines focused on the health issues that impact our community, our region, the state of Tennessee and the world.</p>
                    <ul>
                        <li><a href="/research/research_administration/clinical_trials/">Clinical Trials</a></li>
                        <li><a href="/research/research_compliance/">Compliance</a></li>
                        <li><a href="/research/research_administration/">Grants and Research Agreements</a></li>
                        <li><a href="/redesign/research/">Office of Research</a></li>
                    </ul>
                    <hr />
                    <a class="button hollow small" href="/redesign/research/"><span class="fa fa-plus-circle"></span> Learn More...</a>
                </div>
                <div class="columns">
                    <img src="/-resources/2015/images/mission-clinical-care.jpg" class="uthsc-mission-image">
                    <h2>Clinical Care</h2>
                    <p>Our faculty and students provide health care to the community through our network of hospitals, practice groups, specialty care clinics, and mobile health care facilities.</p>
                    <ul>
                        <li><a href="/bcdd/">Boling Center</a></li>
                        <li><a href="/dentistry/Patients/">Dental Clinic</a></li>
                        <li><a href="/rkstc/">Rachel Kay Stevens Therapy Center</a></li>
                        <li><a href="/ULPS/">UT Le Bonheur Pediatric Specialists</a></li>
                    </ul>
                    <hr />
                    <a class="button hollow small" href="/clinicalcare/"><span class="fa fa-plus-circle"></span> Learn More...</a>
                </div>
                <div class="columns">
                    <img src="/-resources/2015/images/mission-public-service.jpg" class="uthsc-mission-image">
                    <h2>Public Service</h2>
                    <p>Public service is central to our mission. Every year, thousands of faculty, staff and volunteers across four campuses located in Memphis, Knoxville, Chattanooga and Nashville provide clinical care, health education and preventive care programs to the people of Tennessee.</p>
                    <ul>
                        <li><a href="/ciao/">CIAO</a></li>
                        <li><a href="/publicservice/clinica_esperanza.pdf">Clinica Esperanza (Clinic of Hope)</a></li>
                        <li><a href="/fooddrive/">Food Drive</a></li>
                        <li><a href="/hcp/">Health Career Programs</a></li>
                    </ul>
                    <hr />
                    <a class="button hollow small" href="/publicservice/"><span class="fa fa-plus-circle"></span> Learn More...</a>
                </div>
            </div>
            <!--/ Mission Row-->

            <hr />

            <!--Infographics-->
            <div class="uthsc-infographics row text-center" data-equalizer="homepage-stats" data-equalize-on-stack="false">
                <div data-equalizer-watch="homepage-stats" class="columns medium-3">
                    <div class="uthsc-infographic millions">
                        <h2>$200</h2>
                        <p>Million</p>
                        <p>in sponsored programs<br><span class="uthsc-infographic-highlight">in fiscal 2014</span></p>
                    </div>
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

                <div data-equalizer-watch="homepage-stats" class="columns medium-3">
                    <div class="uthsc-infographic billions">
                        <h2>$2.7</h2>
                        <p>Billion</p>
                        <p>contributed to the<br><span class="uthsc-infographic-highlight">Tennessee economy</span></p>
                    </div>
                </div>
            </div>
            <!--/Infographics-->


            <!--Social-->

            <div class="row uthsc-social">
                <div class="columns uthsc-row-title">
                    <h3>UTHSC Now</h3>
                </div>
                <div class="columns medium-6 large-4">
                    <div class="row uthsc-social-boxs">
                        <a href="http://news.uthsc.edu/six-professors-receive-utaa-awards/">
                            <div class="columns">
                                <img src="/-resources/2015/images/uthsc-social-news-1.jpg">
                            </div>
                        </a>
                        <a href="">
                            <div class="columns">
                                <img src="/-resources/2015/images/uthsc-social-instagram-1.jpg">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="columns medium-6 large-8">
                    <div class="row uthsc-social-boxs small-centered" data-equalizer="social-2" data-equalize-by-row="true">
                        <a href="http://news.uthsc.edu/uthsc-communications-marketing-department-receives-two-awards-alumni-magazines-international-competition/">
                            <div class="columns medium-12 large-6" data-equalizer-watch="social-2">
                                <img src="/-resources/2015/images/uthsc-social-news-2.jpg" class="uthsc-social-box-no-image">
                            </div>
                        </a>
                        <a href="https://www.facebook.com/uthsc/posts/10153762268232753">
                            <div class="columns medium-12 large-6" data-equalizer-watch="social-2">
                                <img src="/-resources/2015/images/uthsc-social-facebook-1.jpg">
                            </div>
                        </a>
                        <a href="http://news.uthsc.edu/student-government-association-executive-council-honors-faculty-student-leaders-awards-banquet/">
                            <div class="columns medium-12 large-6" data-equalizer-watch="social-2">
                                <img src="/-resources/2015/images/uthsc-social-news-4.jpg">
                            </div>
                        </a>
                        <a href="https://twitter.com/uthsc/status/733338438401937408">
                            <div class="columns medium-12 large-6 show-for-large" data-equalizer-watch="social-2">
                                <img src="/-resources/2015/images/uthsc-social-twitter-1.jpg">
                            </div>
                        </a>
                        <a href="http://news.uthsc.edu/dr-karen-c-johnson-uthsc-receives-2-3-million-grant-study-weight-loss-increased-physical-activity-affect-aging-individuals-type-2-diabetes/">
                            <div class="columns medium-12 large-6 show-for-large" data-equalizer-watch="social-2">
                                <img src="/-resources/2015/images/uthsc-social-news-3.jpg">
                            </div>
                        </a>
                        <a href="https://twitter.com/uthsc/status/732671713792655360">
                            <div class="columns medium-12 large-6 show-for-large" data-equalizer-watch="social-2">
                                <img src="/-resources/2015/images/uthsc-social-twitter-2.jpg" class="uthsc-social-box-no-image">
                            </div>
                        </a>
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
    <?php include('uthsc-global-footer.php') ?>
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
        <!--Search form-->
        <form class="input-group" aria-label="Search the UTHSC site" action="/search/" method="get" style="margin-bottom:0;">
            <input type="search" aria-label="Search the UTHSC site" role="search" name="s" placeholder="search" style="margin-right:0;">
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
        <a href="/redesign/research"><span class="uthsc-fa-centered fa fa-flask"></span>&emsp;Research</a>
        <a href="/clinicalcare/"><span class="uthsc-fa-centered fa fa-medkit"></span>&emsp;Clinical Care</a>
        <a href="/publicservice/"><span class="uthsc-fa-centered fa fa-globe"></span>&emsp;Public Service</a>
    </div>

    <a href="/give/" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-gift"></span>&emsp;Make a Gift</a>
    <a href="/admissions/visit-uthsc.php" class="call-to-action-link"><span class="uthsc-fa-centered fa fa-road"></span>&emsp;Take a Tour</a>

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
                <li><a href="/email/">Webmail</a></li>
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
<script src="/-resources/2015/js/jquery.min.js"></script>
<script src="/-resources/2015/js/what-input.min.js"></script>
<script src="/-resources/2015/js/foundation.min.js"></script>
<script src="/-resources/2015/js/uthsc.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLV5PU6hBErfU5GOc9Jy4-6bWud2iaVj8&callback=initMap">
</script>

<!--/instagram count fix-->

<!--  Masonry-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.1.0/masonry.pkgd.min.js"></script>
<script>

    $(window).load(function(){

        $('#container').masonry({

            itemSelector: '#container .columns'

        });

    });

</script>
<!--/ Masonry-->

<!--********-->
<!--/Scripts-->
<!--********-->

</body>
</html>