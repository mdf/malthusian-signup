<?php

require_once("./include/dob_selector.php");

?>

<script type="text/javascript">

function enableButton()
{
	if(document.getElementById('terms').checked)
	{
		document.getElementById('submit').disabled='';
	}
	else
	{
		document.getElementById('submit').disabled='true';
	}
}
</script>

<html>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<h1>Terms and Conditions</h1>
<h2>
  <label for="Terms"></label>
  <textarea name="Terms" cols="60" rows="15" readonly id="Terms">For your piece of mind we will do everything possible to protect your information.

GENERAL PRIVACY

We take your privacy seriously. We will never intentionally share your data with other players, the general public or 3rd parties without your consent. Any violations of this policy will be taken seriously and all efforts will be made to reverse the effects of a any sensitive information being shared. 

PUBLIC INFORMATION

Code names used when signing up may be shared with other players and displayed on the AMBER or Malthusian Paradox website. No other personal data will ever be intentionally shared.

HEALTH AND SAFETY

Unforeseen circumstances not-withstanding, We attempt at all times to provide players with all the information they require to undertake assignments in a safe and secure manner. Players are never knowingly sent into situations that pose a significant risk to a players health or safety. 

PLAYER CONDUCT

Your continued involvement with us is conditional upon the demonstration of a public manner which will in no way reflect poorly upon our organisation. Conduct contrary to this condition, such as bad language, rudeness, aggression, or any similar potentially embarrassing or disruptive behaviour displayed during the completion of assignments, will result in the immediate termination of your involvement with the game. </textarea>
</h2>


<form method="post" action="register_demographic.php">
  
  <p>
Please enter your date of birth:
<?php 
echo dob_selector();
?>
</p>

<p>
I agree to the above terms and conditions: 
<input type="checkbox" id="terms" name="terms" value="true" onClick="javascript:enableButton();">
</p>

<input type="submit" disabled="disabled" class="date" id="submit" value="next">
</form>

</body>
</html>