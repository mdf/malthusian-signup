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

<html>
<body>

<p>
To initiate the Covernomics application process ALL APPLICANTS are required to complete the questions below. An assessment of the applicant's suitability for Agent status will be made by Senior Management following the completion of these non-negotiable information requests. 
</p>

<form method="post" action="register_consent.php">

<p>
What is your gender?<br>
<input type="radio" name="2" value="male">Male<br>
<input type="radio" name="2" value="female">Female<br>
</p>

<p>
What educational qualifications do you have?<br>
<input type="checkbox" name="3[]" value="none">No formal qualifications<br>
<input type="checkbox" name="3[]" value="gcse">GCSE / O-level / Standard Grades<br>
<input type="checkbox" name="3[]" value="alevel">BTEC / A-level / Highers<br>
<input type="checkbox" name="3[]" value="nvq">Vocational / NVQ<br>
<input type="checkbox" name="3[]" value="degree">Degree or equivalent<br>
<input type="checkbox" name="3[]" value="postgrad">Postgraduate Qualification<br>
<input type="checkbox" name="3[]" value="other">Other
<input type="text" name="3[]"><br>
</p>

<p>
How did you find out about the game?
<input type="text" name="4">
</p>

<p>
Which of the following technologies do you own? Tick all that apply.<br>
<input type="checkbox" name="5[]" value="smartphone">Smartphone<br>
<input type="checkbox" name="5[]" value="laptop">Laptop<br>
<input type="checkbox" name="5[]" value="tablet">Tablet<br>
<input type="checkbox" name="5[]" value="mp3">MP3 player<br>
<input type="checkbox" name="5[]" value="console">Games console (X-Box, PS3, Wii etc.)<br>
<input type="checkbox" name="5[]" value="psp">Portable gaming device (e.g. PS Vita, Nintendo DS)<br>
<input type="checkbox" name="5[]" value="pdvd">Portable DVD player<br>
<input type="checkbox" name="5[]" value="kindle">Kindle<br>
<input type="checkbox" name="5[]" value="smarttv">Smart Television<br>
</p>

<p>
Which of the following activities do you regularly take part in (e.g. more than 4 times a week)? Tick all that apply<br>
<input type="checkbox" name="6[]" value="facebook">Facebook posting<br>
<input type="checkbox" name="6[]" value="tweet">Tweeting<br>
<input type="checkbox" name="6[]" value="msg">Commenting on online message boards<br>
<input type="checkbox" name="6[]" value="blog">Blogging<br>
<input type="checkbox" name="6[]" value="mmorpg">Playing MMORPGs<br>
<input type="checkbox" name="6[]" value="content">Uploading content (e.g. videos to YouTube)<br>
</p>

<p>
Have you ever been involved in an ARG (alternative reality game), pervasive drama or pervasive game before?<br>
<input type="radio" name="7" value="true">yes<br>
<input type="radio" name="7" value="false">no<br>
</p>

<p>
What do you hope to get out of the Malthusian Paradox?
<input type="text" name="8">
</p>

<input type="submit" value="next">
</form>

</body>
</html>