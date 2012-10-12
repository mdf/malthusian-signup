<?php

session_start();

if(isset($_POST["terms"]))
{
	$_SESSION['terms'] = true;
}
else
{
	$_SESSION['terms'] = false;
}

$_SESSION['player_info'] = array();
$_SESSION['player_info']['demographics'] = array();

$_SESSION['player_info']['demographics']['1'] = date($_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year']);

?>

<!-- End | MRL session code  -->

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- Title -->
<title>We Are AMBER | Join Us</title>

<!-- Start >> Meta Tags and Inline Scripts -->
<meta name='robots' content='noindex,nofollow' />
<link rel="alternate" type="application/rss+xml" title="We Are AMBER &raquo; Feed" href="http://www.weareamber.com/?feed=rss2" />
<link rel="alternate" type="application/rss+xml" title="We Are AMBER &raquo; Comments Feed" href="http://www.weareamber.com/?feed=comments-rss2" />

<!-- Styles -->
<link rel='stylesheet' id='pagelines-less-css'  href='http://www.weareamber.com/?pageless=1_1349824153' type='text/css' media='all' />
<link rel='stylesheet' id='pagelines-child-stylesheet-css'  href='http://www.weareamber.com/wp-content/themes/spitzer/style.css?ver=232-100292712' type='text/css' media='all' />

<!-- Scripts -->
<script type='text/javascript' src='http://www.weareamber.com/wp-includes/js/jquery/jquery.js?ver=1.7.2'></script>
<script type='text/javascript' src='http://www.weareamber.com/wp-content/themes/pagelines/sections/navbar/navbar.js?ver=3.4.2'></script>
<link rel="shortcut icon" href="http://www.weareamber.com/wp-content/uploads/2012/10/favicon.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="http://www.weareamber.com/wp-content/uploads/2012/10/apple-touch-icon.png" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.weareamber.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.weareamber.com/wp-includes/wlwmanifest.xml" /> 
<link rel='prev' title='Previous Post' href='http://www.weareamber.com/' />
<meta name="generator" content="WordPress 3.4.2" />
<link rel='canonical' href='http://www.weareamber.com/?page_id=39' />

<!-- NavBar | Section Head -->
			<!--[if IE 8]>
				<style>
					.nav-collapse.collapse {
						height: auto;
						overflow: visible;
					}
				</style>
			<![endif]-->		
		
</head>

<!-- Start >> HTML Body -->
<body class="page page-id-39 page-template-default custom responsive spitzer default full_width  spitzer-pat0 spitzer-yellow">
<div id="site" class="one-sidebar-right">
	<div id="page" class="thepage">
				<div class="page-canvas">
						<header id="header" class="container-group">
				<div class="outline">
					

<!-- Branding | Section Template -->
<section id="branding" class="container no_clone section-branding fix"><div class="texture"><div class="content"><div class="content-pad"><div class="branding_wrap fix"><a class="plbrand mainlogo-link" href="http://www.weareamber.com" title="We Are AMBER"><img class="mainlogo-img" src="http://www.weareamber.com/wp-content/uploads/2012/10/amber-header.png" alt="We Are AMBER" /></a><div class="icons" style="bottom: 12px; right: 1px;"><a target="_blank" href="http://www.weareamber.com/?feed=rss2" class="rsslink"><img src="http://www.weareamber.com/wp-content/themes/pagelines/sections/branding/rss.png" alt="RSS"/></a><a target="_blank" href="https://twitter.com/AmberOps" class="twitterlink"><img src="http://www.weareamber.com/wp-content/themes/pagelines/sections/branding/twitter.png" alt="Twitter"/></a><a target="_blank" href="http://www.youtube.com/themalthusianparadox" class="youtubelink"><img src="http://www.weareamber.com/wp-content/themes/pagelines/sections/branding/youtube.png" alt="Youtube"/></a></div></div>		
			<script type="text/javascript"> 
				jQuery('.icons a').hover(function(){ jQuery(this).fadeTo('fast', 1); },function(){ jQuery(this).fadeTo('fast', 0.5);});
			</script>
</div></div></div></section>

<!-- NavBar | Section Template -->
<section id="navbar" class="container no_clone section-navbar fix"><div class="content"><div class="content-pad">	<div class="navbar fix navbar-content-width  pl-color-black-trans">
	  <div class="navbar-inner ">
	    <div class="navbar-content-pad fix">
	    		
	      <a href="javascript:void(0)" class="nav-btn nav-btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
			
	      		<div class="nav-collapse collapse">
	       <ul id="menu-main" class="font-sub navline pldrop pull-left"><li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25"><a href="http://www.weareamber.com/">Previous Post</a></li>
<li id="menu-item-48" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-39 current_page_item menu-item-48"><a href="register_terms.php">Join Us</a></li>
</ul>				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div></div></section>				</div>
			</header>
						<div id="page-main" class="container-group">
				<div id="dynamic-content" class="outline">	


<!-- Content | Section Template -->
<section id="content" class="container no_clone section-content-area fix"><div class="texture"><div class="content"><div class="content-pad">		<div id="pagelines_content" class="one-sidebar-right fix">

						<div id="column-wrap" class="fix">

								<div id="column-main" class="mcolumn fix">
					<div class="mcolumn-pad" >
						

<!-- PostLoop | Section Template -->
<section id="postloop" class="copy no_clone section-postloop"><div class="copy-pad"><article class="post-39 page type-page status-publish hentry fpost post-number-1" id="post-39"><div class="hentry-pad"><section class="post-meta fix post-nothumb  media"><section class="bd post-header fix" ><section class="bd post-title-section fix"><hgroup class="post-title fix">
  <h1 class="entry-title pagetitle">The Malthusian Paradox Study</h1>
</hgroup></section> </section></section><div class="entry_wrap fix"><div class="entry_content">

<!-- Begin | MRL registration code  -->


<?php

session_start();

foreach($_POST as $key => $val)
{
	if(!is_array($val))
	{
		if(strlen($val)>0)
		{
			$_SESSION['player_info']['demographics'][$key] = $val;
		}
		else 
		{
			$_SESSION['player_info']['demographics'][$key] = null;
		}
	}
	else
	{
		$vstr = "";
		
		foreach ($val as $v)
		{
			if(strlen($v)>0)
			{
				$vstr .= $v . ",";
			}
		}
		
		$_SESSION['player_info']['demographics'][$key] = $vstr;
	}
}


/*
	foreach ($_SESSION as $key=>$val)
		echo $key." \"".$val."\"";
		
		print_r($_SESSION);

		print_r($_POST);
		*/
		
		/*
if(isset($_POST["q2"]))
{
	$_SESSION['gender'] = $_POST["gender"];
}
else
{
	$_SESSION['gender'] = "none";
}

if(isset($_POST["education"]))
{
	$_SESSION['education'] = $_POST["education"];
}
else
{
	$_SESSION['education'] = "none";
}

$_SESSION['awareness'] = $_POST['awareness'];

if(is_array($_POST['technology']))
{
	$tech = $_POST['technology'];
	$ts = "";
	foreach ($tech as $t)
	{
		$ts .= $t . ",";
	}
	$_SESSION['technology'] = $ts;
}
else
{
	$_SESSION['technology'] = "none";	
}

if(is_array($_POST['activities']))
{
	$tech = $_POST['activities'];
	$ts = "";
	foreach ($tech as $t)
	{
		$ts .= $t . ",";
	}
	$_SESSION['activities'] = $ts;
}
else
{
	$_SESSION['activities'] = "none";	
}

if(isset($_POST["previous"]))
{
	$_SESSION['previous'] = $_POST["previous"];
}
else
{
	$_SESSION['previous'] = "none";
}

*/

?>

<html>

<p>
  <label for="study"></label>
  <textarea name="study" cols="60" rows="15" readonly id="study">We are a team of researchers from the Mixed Reality Lab and the Department of Culture, Film and Media at the University of Nottingham. We are working on the Malthusian Paradox project, which is funded by the Arts Council through a Grants for the Arts award. An area of research we are particularly interested in is the interaction between people and computers. In the future, the number of computer devices used by humans will increase dramatically, adding complexity to the way we interact with technology, but also new opportunities to create games and other interactive experiences. 

The aim of our research is to explore the different ways that the creative sector can make use of these new technologies, and understand how audiences and players engage with and experience games that are built using them. To this end we have worked in collaboration with Urban Angel to create the game that you are about to play. Specific aspects of the game have been designed with our research in mind. 

The project ultimately aims to publish its findings in appropriate academic publications, and subsequently through the ACM digital library. In this case, any data will be appropriately anonymised to prevent identification. 

Data Collection and Consent

As part of our research we would like to collect data regarding how you take part in the Malthusian Paradox, both online and at participating venues, which we will subsequently analyse and study. This data is important, as it will help us create better gaming experiences, and also influence future interactive technologies. This data may include what we class as "personal data", or data that may potentially be used to identify an individual, for example audio or video recordings. 

We ask for your consent to collect and analyse three different kinds of data during the game: 

Our computer systems will create logs and databases as part of your interaction with the game, in order for the game to function. This data would include records of your visits to the game's websites, any information you enter into these websites, and digital records of your interactions with any game-related artefacts found in participating venues. 

One of our researchers will be visibly present at the participating venues that you may visit during the Malthusian Paradox, collecting video and audio recordings of you and the group you are with as you play the game at that particular venue. 

At the conclusion of the game we would potentially also like to ask you a series of short questions about your gaming experience, and record your answers using video and audio recordings. 



All of this data will be held in a secure and safe manner in accordance with the Data Protection Act 1998. Access to this data will be restricted to researchers involved in the project, and will be processed confidentially and completely anonymously. It is within your rights to refuse the collection of any of the specific types of data identified above. The results from the study will be used for publication in academic conferences and journals. The expected total length of the study is equal to the duration of the game. You are free to withdraw at any point during, or after, the study and any data collected will be erased from our records. 

To withdraw, simply inform the researcher present at the venue or use the following details to contact us with any queries you might have:

Dr Martin Flintham
Mixed Reality Lab (MRL),
School of Computer Science,
University of Nottingham,
Jubilee Campus,
Nottingham,
NG8 1BB

martin.flintham@nottingham.ac.uk


This project has been subject to ethical review, according to the procedures specified by the University of Nottingham Research Ethics Committee, and has been allowed to proceed. 

The Malthusian Paradox Study Consent Form

We need your consent to allow us to collect and analyse data regarding your participation in the Malthusian Paradox. Please tick the boxes below for the activities for which you give consent. </textarea>
</p

>

<p>
  <b>Please note that you may withhold consent from any or all of the study, and this will not affect or detrimentally change your experience of the Malthusian Paradox.</b>
</p>

<form method="post" action="register_player.php">

<p>
  <input type="hidden" name="csubmitted" id="csubmitted" value="1"/>
</p>
<p>&nbsp; </p>
<p>
  <input name="1" type="checkbox" value="true"> I have read and understand the attached information sheet, which includes information about the research project, and the data that may be recorded and published. I understand that I can withdraw consent for my participation at any time, and my personal data will be erased from our records and systems.</p>
<p>
  <input type="checkbox" name="2" value="true">
 I give permission for digital records generated during the course of my interaction with The Malthusian Paradox, including information I submit to the  websites, to be used as part of the study in an anonymised form.
</p>
<p>
  <input type="checkbox" name="3" value="true"> I give consent for video and audio recordings of my interactions with the game at participating venues to be collected, and I agree to the use of this data in an anonymised form.
</p>
<p>
  <input type="checkbox" name="4" value="true"> 
I give consent to taking part in a structured interview regarding my experience of The Malthusian Paradox at the conclusion of the game, and I agree to the use of this data in an anonymised form.</p>
<p>&nbsp;</p>

<p>
<input type="submit" value="next">
</p>

</form>

<!-- End | MRL registration code  -->

</div></div></div></article><div class="clear"></div></div></section>					</div>
				</div>

							</div>	
			
		<div id="sidebar-wrap" class="">
					<div id="sidebar1" class="scolumn" >
					<div class="scolumn-pad">
						

<!-- Primary Sidebar | Section Template -->
<section id="sb_primary" class="copy no_clone section-sb_primary"><div class="copy-pad"><ul id="list_sb_primary" class="sidebar_widgets fix"><li id="categories-2" class="widget_categories widget fix"><div class="widget-pad"><h3 class="widget-title">Information</h3>		<ul>
	<li class="cat-item cat-item-7"><a href="http://www.weareamber.com/?cat=7" title="View all posts filed under News">News</a>
</li>
		</ul>
</div></li></ul><div class="clear"></div></div></section>	
					</div>
				</div>
					</div>		
			</div>
</div></div></div></section>				</div>
								<div id="morefoot_area" class="container-group">
									</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<footer id="footer" class="container-group">
		<div class="outline fix">
		

<!-- Simple Nav | Section Template -->
<section id="simple_nav" class="container no_clone section-simple_nav fix"><div class="texture"><div class="content"><div class="content-pad"><div class="menu-main-container"><ul id="menu-main-1" class="inline-list simplenav font-sub"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25"><a href="http://www.weareamber.com/">Previous Post</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-39 current_page_item menu-item-48"><a href="http://www.weareamber.com/?page_id=39">Join Us</a></li>
</ul></div></div></div></div></section><div id="cred" class="pagelines" style="display: block; visibility: visible;"><a class="plimage" target="_blank" href="http://malthusianparadox.com" title="AMBER is part of The Malthusian Paradox a transmedia ARG narrative"><img src="http://www.weareamber.com/wp-content/uploads/2012/10/AMBER-LOGO1.png" alt="AMBER is part of The Malthusian Paradox a transmedia ARG narrative" /></a></div><div class="clear"></div>		</div>
	</footer>
</div>

<!-- Footer Scripts -->
<script type='text/javascript' src='http://www.weareamber.com/wp-content/themes/pagelines/js/script.bootstrap.min.js?ver=2.0.3'></script>
<script type='text/javascript' src='http://www.weareamber.com/wp-content/themes/pagelines/js/script.blocks.js?ver=1.0.1'></script>
</body>
</html>
