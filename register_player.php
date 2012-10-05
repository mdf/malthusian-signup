<?php

session_start();

require_once("./include/membersite_config.php");

if(isset($_POST["csubmitted"]) && $_POST["csubmitted"]==1)
{	
	if(isset($_POST["consent_info"]))
	{
		$_SESSION['consent_info'] = 1;
	}
	else
	{
		$_SESSION['consent_info'] = 0;
	}
	
	if(isset($_POST["consent_logs"]))
	{
		$_SESSION['consent_logs'] = 1;
	}
	else
	{
		$_SESSION['consent_logs'] = 0;
	}
	
	if(isset($_POST["consent_video"]))
	{
		$_SESSION['consent_video'] = 1;
	}
	else
	{
		$_SESSION['consent_video'] = 0;
	}
	
	if(isset($_POST["consent_interview"]))
	{
		$_SESSION['consent_interview'] = 1;
	}
	else
	{
		$_SESSION['consent_interview'] = 0;
	}
}
	
if(isset($_POST["psubmitted"]) && $_POST["psubmitted"]==1)
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.php");
   }
}

	foreach ($_SESSION as $key=>$val)
		echo $key." \"".$val."\"";

		
?>

<html>
<body>

<h1>
Player registration
</h1>

<form method="post" action="register_player.php">

<input type="hidden" name="psubmitted" id="psubmitted" value="1"/>

<?php echo $fgmembersite->GetErrorMessage(); ?>

<p>
First name <input type='text' name="firstname" id="firstname" value="<?php echo $fgmembersite->SafeDisplay("firstname") ?>" maxlength="50" />
</p>

<p>
Last name <input type='text' name="lastname" id="lastname" value="<?php echo $fgmembersite->SafeDisplay("lastname") ?>" maxlength="50" />
</p>

<p>
Code name <input type='text' name="codename" id="codename" value="<?php echo $fgmembersite->SafeDisplay("codename") ?>" maxlength="50" />
</p>

<p>
Email address <input type='text' name="email" id="email" value="<?php echo $fgmembersite->SafeDisplay("email") ?>" maxlength="32" />
</p>

<p>
Twitter ID <input type='text' name="twitter" id="twitter" value="<?php echo $fgmembersite->SafeDisplay("twitter") ?>" maxlength="32" />
</p>

<p>
Postcode <input type='text' name="postcode" id="postcode" value="<?php echo $fgmembersite->SafeDisplay("postcode") ?>" maxlength="32" />
</p>

<p>
Mobile number <input type='text' name="mobile" id="mobile" value="<?php echo $fgmembersite->SafeDisplay("mobile") ?>" maxlength="32" />
</p>

<p>
Password <input type='password' name="password" id="password" value="<?php echo $fgmembersite->SafeDisplay("password") ?>" maxlength="32" />
</p>

<p>
Retype password <input type='password' name="password2" id="password2" value="<?php echo $fgmembersite->SafeDisplay("password2") ?>" maxlength="32" />
</p>

<input type="submit" value="submit">

</form>

</body>
</html>