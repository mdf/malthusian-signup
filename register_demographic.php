<?php

session_start();

if(isset($_POST["terms"]))
{
	$_SESSION['terms'] = 1;
}
else
{
	$_SESSION['terms'] = 0;
}

$_SESSION['dob'] = date($_POST['year']."/".$_POST['month']."/".$_POST['day']);

?>

<html>
<body>

<p>
To initiate the Covernomics application process ALL APPLICANTS are required to complete the questions below. An assessment of the applicant's suitability for Agent status will be made by Senior Management following the completion of these non-negotiable information requests. 
</p>

<form method="post" action="register_consent.php">

<p>
What is your gender?<br>
<input type="radio" name="gender" value="male">Male<br>
<input type="radio" name="gender" value="female">Female<br>
</p>

<p>
What is your highest educational qualification?<br>
<input type="radio" name="education" value="none">No formal qualifications<br>
<input type="radio" name="education" value="gcse">GCSE / O-level / Standard Grades<br>
<input type="radio" name="education" value="alevel">BTEC / A-level / Highers<br>
<input type="radio" name="education" value="nvq">Vocational / NVQ<br>
<input type="radio" name="education" value="degree">Degree or equivalent<br>
<input type="radio" name="education" value="postgrad">Postgraduate Qualification<br>
<input type="radio" name="education" value="other">Other
<input type="text" name="education_other"><br>
</p>

<p>
How did you find out about the game?
<input type="text" name="awareness">
</p>

<p>
Which of the following technologies do you own?<br>
<input type="checkbox" name="technology[]" value="smartphone">Smartphone<br>
<input type="checkbox" name="technology[]" value="laptop">Laptop<br>
<input type="checkbox" name="technology[]" value="tablet">Tablet<br>
<input type="checkbox" name="technology[]" value="mp3">MP3 player<br>
<input type="checkbox" name="technology[]" value="console">Games console (X-Box, PS3, Wii etc.)<br>
<input type="checkbox" name="technology[]" value="psp">Portable gaming device (e.g. PS Vita, Nintendo DS)<br>
<input type="checkbox" name="technology[]" value="pdvd">Portable DVD player<br>
<input type="checkbox" name="technology[]" value="kindle">Kindle<br>
<input type="checkbox" name="technology[]" value="smarttv">Smart Television<br>
</p>

<p>
Which of the following activities do you regularly take part in (e.g. more than 4 times a week)<br>
<input type="checkbox" name="activities[]" value="facebook">Facebook posting<br>
<input type="checkbox" name="activities[]" value="tweet">Tweeting<br>
<input type="checkbox" name="activities[]" value="msg">Commenting on online message boards<br>
<input type="checkbox" name="activities[]" value="blog">Blogging<br>
<input type="checkbox" name="activities[]" value="mmorpg">MMORPG<br>
<input type="checkbox" name="activities[]" value="content">Uploading content (e.g. videos to YouTube)<br>
</p>

<p>
Have you ever been involved in an ARG (alternative reality game), pervasive drama or pervasive game before?<br>
<input type="radio" name="previous" value="yes">yes<br>
<input type="radio" name="previous" value="no">no<br>
</p>

<input type="submit" value="next">
</form>

</body>
</html>