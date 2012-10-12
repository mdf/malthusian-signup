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
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>AMBER Registration</title>
<body>

<h1>optional information</h1>

<form method="post" action="register_consent.php">

<h6>&nbsp;  </h6>
<h6>What is your gender?</h6>
  <input type="radio" name="2" value="male">Male<br>
  <input type="radio" name="2" value="female">Female</p>
<h6><br>
</h6>

<h6>
  What educational qualifications do you have?</h6>
  <input type="checkbox" name="3[]" value="none">No formal qualifications<br>
  <input type="checkbox" name="3[]" value="gcse">GCSE / O-level / Standard Grades<br>
  <input type="checkbox" name="3[]" value="alevel">BTEC / A-level / Highers<br>
  <input type="checkbox" name="3[]" value="nvq">Vocational / NVQ<br>
  <input type="checkbox" name="3[]" value="degree">Degree or equivalent<br>
  <input type="checkbox" name="3[]" value="postgrad">Postgraduate Qualification<br>
  <input type="checkbox" name="3[]" value="other">Other
  <input type="text" name="3[]">
</p>
<h6><br>
</h6>

<h6>
  How did you find out about the game?  </h6>
<p>&nbsp;</p>
<h5>
  <input name="4" type="text" size="50">
</h5>
<p>&nbsp;</p>
<h6>Which of the following technologies do you own? <br>
  Tick all that apply.</h6>
  <input type="checkbox" name="5[]" value="smartphone">Smartphone<br>
  <input type="checkbox" name="5[]" value="laptop">Laptop<br>
  <input type="checkbox" name="5[]" value="tablet">Tablet<br>
  <input type="checkbox" name="5[]" value="mp3">MP3 player<br>
  <input type="checkbox" name="5[]" value="console">Games console (X-Box, PS3, Wii etc.)<br>
  <input type="checkbox" name="5[]" value="psp">Portable gaming device (e.g. PS Vita, Nintendo DS)<br>
  <input type="checkbox" name="5[]" value="pdvd">Portable DVD player<br>
  <input type="checkbox" name="5[]" value="kindle">Kindle<br>
  <input type="checkbox" name="5[]" value="smarttv">Smart Television</p>
<p><br>
</p>

<h6>
  Which of the following activities do you regularly<br>
  take part in (e.g. more than 4 times a week)? <br>
  Tick all that apply</h6>
  <input type="checkbox" name="6[]" value="facebook">Facebook posting<br>
  <input type="checkbox" name="6[]" value="tweet">Tweeting<br>
  <input type="checkbox" name="6[]" value="msg">Commenting on online message boards<br>
  <input type="checkbox" name="6[]" value="blog">Blogging<br>
  <input type="checkbox" name="6[]" value="mmorpg">Playing MMORPGs<br>
  <input type="checkbox" name="6[]" value="content">Uploading content (e.g. videos to YouTube)</p>
<p><br>
</p>

<h6>
  Have you ever been involved in an ARG <br>
  (alternative reality game), pervasive drama <br>
  or pervasive game before?</h6>
  <input type="radio" name="7" value="true">yes<br>
  <input type="radio" name="7" value="false">no</p>
<p><br>
</p>

<h6>
  What do you hope to get out of The Malthusian Paradox?</h6>
<p>&nbsp;</p>
<p>
  <input name="8" type="text" size="50">
</p>
<p>&nbsp;</p>

<input type="submit" value="next">
</form>

</body>
</html>