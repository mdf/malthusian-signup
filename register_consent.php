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
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<h1>The Malthusian Paradox Study</h1>

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
  <input type="checkbox" name="1" value="true"> I have read and understand the attached information sheet, which includes information about the research project, and the data that may be recorded and published. I understand that I can withdraw consent for my participation at any time, and my personal data will be erased from our records and systems.</p>
<p>&nbsp;</p>

<p>
<input type="checkbox" name="2" value="true"> I give permission for digital records generated during the course of my interaction with the Malthusian Paradox, including information I submit to the game’s websites, to be used as part of the study in an anonymised form.
</p>
<p>&nbsp;</p>

<p>
<input type="checkbox" name="3" value="true"> I give consent for video and audio recordings of my interactions with the game at participating venues to be collected, and I agree to the use of this data in an anonymised form.
</p>
<p>&nbsp;</p>

<p>
<input type="checkbox" name="4" value="true"> I give consent to taking part in a structured interview regarding my experience of the Malthusian Paradox at the conclusion of the game, and I agree to the use of this data in an anonymised form.
</p>
<p>&nbsp;</p>

<p>
<input type="submit" value="next">
</p>

</form>

</body>
</html>