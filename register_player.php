<?php

session_start();

require_once("./include/registration.php");

if(isset($_POST["csubmitted"]) && $_POST["csubmitted"]==1)
{	
	$_SESSION['player_info']['consent'] = array();
	
	foreach($_POST as $key => $val)
	{
		$_SESSION['player_info']['consent'][$key] = $val;
	}
}
	
if(isset($_POST["psubmitted"]) && $_POST["psubmitted"]==1)
{
   if($registrationSite->registerUser())
   {
        $registrationSite->redirectToURL("thank-you.php");
   }
}

?>

<html>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<h1>
Player Registration
</h1>

<form method="post" action="register_player.php">

<input type="hidden" name="psubmitted" id="psubmitted" value="1"/>

<?php echo $registrationSite->getErrorMessage(); ?>

<p>
First name <input type='text' name="firstname" id="firstname" value="<?php echo $registrationSite->safeDisplay("firstname") ?>" maxlength="50" />
</p>
<p>&nbsp;</p>

<p>
Last name <input type='text' name="lastname" id="lastname" value="<?php echo $registrationSite->safeDisplay("lastname") ?>" maxlength="50" />
</p>
<p>&nbsp;</p>

<p>
Code name <input type='text' name="codename" id="codename" value="<?php echo $registrationSite->safeDisplay("codename") ?>" maxlength="50" />
</p>
<p>&nbsp;</p>

<p>
Email address <input type='text' name="email" id="email" value="<?php echo $registrationSite->safeDisplay("email") ?>" maxlength="32" />
</p>
<p>&nbsp;</p>

<p>
Twitter ID <input type='text' name="twitter" id="twitter" value="<?php echo $registrationSite->safeDisplay("twitter") ?>" maxlength="32" />
</p>
<p>&nbsp;</p>

<p>
Postcode <input type='text' name="postcode" id="postcode" value="<?php echo $registrationSite->safeDisplay("postcode") ?>" maxlength="32" />
</p>
<p>&nbsp;</p>

<p>
Mobile number <input type='text' name="mobile" id="mobile" value="<?php echo $registrationSite->safeDisplay("mobile") ?>" maxlength="32" />
</p>
<p>&nbsp;</p>

<p>
Password <input type='password' name="password" id="password" value="<?php echo $registrationSite->safeDisplay("password") ?>" maxlength="32" />
</p>
<p>&nbsp;</p>

<p>
Retype password <input type='password' name="password2" id="password2" value="<?php echo $registrationSite->safeDisplay("password2") ?>" maxlength="32" />
</p>

<input type="submit" value="submit">

</form>

</body>
</html>