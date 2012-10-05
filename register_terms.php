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
<body>

<h1>Terms and Conditions</h1>
<h2>For your piece of mind COVERNOMICS will do everything possible to protect your information.</h2>
 
<h2>GENERAL PRIVACY</h2>
<p>
Covernomics takes your privacy seriously. Covernomics will never intentionally share your data with other Agents, the general public or 3rd parties without your consent. Any violations of this policy will be taken seriously and all efforts will be made to reverse the effects of a any sensitive information being shared.
</p>

<h2>PUBLIC INFORMATION</h2>
<p>
Agent's countries and Aliases used when signing up may be shared with other Agents and displayed on the Covernomics website. No other personal data will ever be intentionally shared by Covernomics.
</p>

<h2>AGENT TO AGENT CONTACT</h2>
<p>
Agents are not prohibited from entering into correspondence, or other contact during the completion of assignments, or otherwise. Agents are expected to fully report such correspondence/contact to their direct superior.
We do not actively discourage general public discussion about Covernomics. However we would prefer that Agents display a high degree of discretion when relating details of Covernomics operational practices. Inappropriate disclosure of details pertaining to upcoming assignment(s) that result in the compromise of the assignment(s) can result in disciplinary action.
</p>

<h2>HEALTH AND SAFETY</h2>
<p>
Covernomics prides itself on its excellent safety record. Unforeseen circumstances not-withstanding, Covernomics attempts at all times to provide Agents with all the information they require to undertake assignments in a safe and secure manner. Agents are never knowingly sent into situations that pose a significant risk to Agent health or safety.
</p>

<h2>AGENT CONDUCT</h2>
<p>
Covernomics highly values its strong corporate image and reputation, so your continued involvement with us is conditional upon the demonstration of a public manner which will in no way reflect poorly upon our organisation. Conduct contrary to this condition, such as bad language, rudeness, aggression, or any similar potentially embarrassing or disruptive behaviour displayed during the completion of assignments, will result in the immediate termination of your involvement with the organisation.
</p>


<form method="post" action="register_demographic.php">

<p>
Please enter your date of birth:
<?php 
echo dob_selector();
?>
</p>

<p>
I agree to the above terms and conditions: 
<input type="checkbox" id="terms" name="terms" value="true" onclick="javascript:enableButton();">
</p>

<input type="submit" id="submit" value="next" disabled="disabled">
</form>

</body>
</html>