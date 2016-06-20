<?php include("/var/www/html/_resources/includes/virthosts.php"); ?><!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
      <title>UTHSC Search</title>
      <meta name="verify-v1" content="YUrAnM0Cl+PjGM/UDeu05U65KJI5gXxQ327vyX2vzrE=" />
      <meta name="google-site-verification"
            content="T23m4JlPYt44hGX93d4d_R8UYhQhDorjQxoHqKIsVas" />
      <meta name="y_key" content="c8deedec3d337076" />
      <meta name="verify-v1" content="W76TklzfvZ4Ay4w9Ib2zSsndFIu8TnGfdT/z32QImzE=" />
      <meta name="google-site-verification"
            content="ysl5pvxbLOqPtGwTHL_o4hbaKfY2_m3_-yr2thv-Gw0" />
      <meta name="description"
            content="Established in 1911, The University of Tennessee Health Science Center aims to improve    human health through education, research, clinical care and public service. The UT Health Science Center campuses include   colleges of Allied Health Sciences, Dentistry, Graduate Health Sciences, Medicine, Nursing and Pharmacy. Patient care,    professional education and research are carried out at hospitals and other clinical sites across Tennessee. Endowed professorships,   Research Centers of Excellence, and continuing relationships with research and healthcare facilities across Tennessee ensure that both   basic science and applied research stay focused on contemporary health topics." />
      <meta name="keywods"
            content="university, tennessee, health science center, memphis, university of tennessee memphis, university of tennessee    health science center, tennessee schools, tennessee colleges, tennessee higher education, higher education, medicine, pharmacy, health professions,    biomedical engineering, dentistry, nursing" />
      <meta name="author" content="University of Tennessee Health Science Center" />
      <link rel="shortcut icon" href="/images/favicon.ico?v=083012-1411" /><script type="text/javascript">
			var page_id="http://www.uthsc.edu/search/index.php";
		</script><script type="text/javascript">
       		var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-1243033-1']);
			_gaq.push(['_setDomainName', 'uthsc.edu']);
			_gaq.push(['_trackPageview']);
			
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script><link rel="shortcut icon" href="/images/favicon.ico?v=083012-1411" />
      <link rel="stylesheet" type="text/css" media="all"
            href="/_resources/styles/css/reset.css" />
      <link rel="stylesheet" type="text/css" media="all"
            href="/_resources/styles/css/uthsc.css" />
      <link rel="stylesheet" type="text/css" media="print"
            href="/_resources/styles/css/print.css" />
      <link rel="stylesheet" href="/_resources/styles/css/flexslider_interior.css"
            type="text/css" /><script type="text/javascript"
              src="https://www.google.com/jsapi?key=ABQIAAAA7OXDbZemXsjUQbAoIdq5GRSez49Sw6B0PdjsTxkTdD44Oe_aFBT50lwm4FYWKow9yq4KpSgxAT3x1A"></script><script type="text/javascript"
              src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script><script type="text/javascript"
              src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script><?php if ($_GET['col'] == "ldap" || $_GET['searchtype'] == "ldap") {
header("location:http://oracle.uthsc.edu/directory.php?action=SEARCH&p_search=". ($_GET['q']));
}
// value for uthsc search 		= "010196583402354315885:vfumswlexgy"
// value for ut system search = "010196583402354315885:khq6oqhed8g";

$cxvalue = "010196583402354315885:vfumswlexgy";
if ($_GET['cx'] != "") $cxvalue = $_GET['cx'];
?><style type="text/css" media="all">
			#main_content #cse-search-results iframe {width:480px;}
			#main_content #cse-search-box {margin-bottom:10px;}
		</style><script type="text/javascript">
			function changeRadio(searchType){
				if (searchType == 1)
					document.getElementById('cxvalue1').value = "010196583402354315885:vfumswlexgy";
				else if (searchType == 2)
					document.getElementById('cxvalue1').value = "010196583402354315885:khq6oqhed8g";
			}

		</script><script type="text/javascript" src="/_resources/scripts/directedit.js"></script><script type="text/javascript">
					$(document).ready(function(){ directedit(); });
				</script><script type="text/javascript" src="/_resources/scripts/nested-navigation.js"></script><script type="text/javascript" src="/_resources/scripts/email.js"></script><link rel="stylesheet" href="/_resources/styles/css/jquery-ui-1.10.1.custom.css"
            type="text/css"
            media="screen, projection" />
      <link rel="stylesheet" href="/_resources/styles/css/jquery-ui-uthsc-custom.css"
            type="text/css"
            media="screen, projection" /><style type="text/css">@import '/_resources/styles/css/purchasing.css';</style><style type="text/css">@import "/_resources/styles/css/purchasing.css";</style><script type="text/javascript">
					/*-- SHOW/HIDE FAQs ANSWERS --*/                                          
					$(document).ready(function() {
						$("div.answer").css({display:"none"});
					
						$("#showall").click(function () {
							$("div.answer").fadeIn("slow");	  
						});
					
						$("#hideall").click(function () {
							$("div.answer").fadeOut("slow");	  
						});

						$(".question").click(function () {
							//split allows for more classes than just two, put question first then id
							var myclass = $(this).attr("class").split(' ');
							if ($("#"+myclass[1]).is(":hidden")) {
								$("#"+myclass[1]).fadeIn("slow");
							} else {
								$("#"+myclass[1]).fadeOut("slow");
							}
						});
					});                    					
				</script><style type="text/css" media="print">
					div.answer {display:block !important;}
				</style><style type="text/css">
					#accordion > h3 {margin:0;}
					#accordion > h3 > a {color:#222;}
					#accordion > h3 > a:hover {color:#141;}		
					</style><script type="text/javascript">
					/*  */
		$(document).ready(function(){
			$( "#accordion" ).accordion({
				heightStyle: "content", 
			});
		});
		/*  */
				</script><script type="text/javascript">
							/*  */
		              $(document).ready(function() {
					$(function() {
						$("#uthsc_tabs").tabs();
					});
					});
		          /*  */
				</script><script type="text/javascript">
		/*  */
	
	function changeType(searchType){
		// value for uthsc search 		= "010196583402354315885:vfumswlexgy"
  	// value for ut system search = "010196583402354315885:khq6oqhed8g";
		if (searchType == "uthsc")
			document.getElementById('cxvalue').value = "010196583402354315885:vfumswlexgy";
		else if (searchType == "utsys")
			document.getElementById('cxvalue').value = "010196583402354315885:khq6oqhed8g";
	}
	
	function clearBox(){
		document.getElementById('some_name').value = '';
		document.getElementById('some_name').style.background = '#ffffff';
	}
	
	function addLogo(value){
		if(!value) document.getElementById('some_name').style.background = '#ffffff url(/images/google_custom_search_watermark.gif) no-repeat left';
	}
	/*  */
	</script></head>
   <body>
      <div id="container">
         <div id="header">
            <h1><a href="/">The University of Tennessee Health Science Center</a></h1>
            <h2>UTHSC</h2><?php include("/var/www/html/_resources/includes/header_nav_search.inc"); ?>
         </div><?php include_once("/var/www/html/_resources/includes/function_icon.inc")			             	
		?>
         <div id="department">
            <div id="department_inner">
               <div id="department_name"><a href="/">UTHSC Home</a></div>
               <div id="department_crumbs"></div>
            </div>
         </div>
         <div id="content">
            <div id="content_inner">
               <div id="main_nav">
                  <ul><?php include("/var/www/html/_leftnav.inc"); ?>
                     <ul data-nav-path="/search/index.php"><?php include("/var/www/html/search/_leftnav.inc"); ?></ul>
                  </ul>
               </div>
               <div id="main_content">
                  <h1>UTHSC Search</h1>
                  <div id="twocol_left">
                     <form action="http://www.uthsc.edu/search/" id="cse-search-box">
                        <div><?php echo '<input type="hidden" id="cxvalue1" name="cx" value="'.$cxvalue.'" />' ; ?><input type="hidden" name="cof" value="FORID:11" /><input type="hidden" name="ie" value="UTF-8" /><input type="text" name="q" size="31" /><input type="submit" name="sa" value="Search" /><br /><?php echo '<input type="radio" id="rb-uthsc" name="searchtype" onchange="javascript:changeRadio(1);"';
	  	if ($_GET['cx'] == "010196583402354315885:vfumswlexgy") echo 'checked="checked"';
		echo '/>UTHSC pages';
		echo '<input type="radio" id="rb-utsys" name="searchtype" onchange="javascript:changeRadio(2);"';
		if ($_GET['cx'] == "010196583402354315885:khq6oqhed8g") echo 'checked="checked"';
		echo '/>UT System pages';
?><input type="radio" id="people" name="searchtype" value="ldap" />People Search
                           
                        </div>
                     </form><script type="text/javascript"
                             src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script><div id="cse-search-results"></div><script type="text/javascript">

  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 480;
  var googleSearchDomain = "www.google.com";
  var googleSearchResizeIframe = true;
  var googleSearchPath = "/cse";

</script><script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script></div>
                  <div id="twocol_right"><?php include("/var/www/html/search/_section.prop.inc"); ?></div>
               </div>
            </div>
         </div>
      </div><br style="clear:both;" /><div id="footer">
         <div id="footer_inner">
            <div id="footer_content"><?php include("/var/www/html/_resources/includes/footer_logo.inc"); ?>
               <div id="emergency-contact"><?php include("/var/www/html/_resources/includes/footer_emergency.inc"); ?></div><?php include("/var/www/html/_resources/includes/footer_copyright.inc"); ?><?php include("/var/www/html/_resources/includes/footer_links.inc"); ?>
            </div>
         </div>
      </div><script type="text/javascript">
	 		window.onload = function(){
	 		if(!document.getElementById("some_name").value) document.getElementById("some_name").style.background = "#ffffff url(/images/google_custom_search_watermark.gif) no-repeat left";
	 		};
	 	</script><div id="hidden" style="display:none;">
         <a id="de" href="http://a.cms.omniupdate.com/10?skin=oucampus&amp;account=UTHSC&amp;site=Home&amp;action=de&amp;path=%2Fsearch%2Findex.pcf" target="_blank">©</a>
      </div>
   </body>
</html>