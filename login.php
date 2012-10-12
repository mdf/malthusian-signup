<?PHP
require_once("./include/registration.php");

if(isset($_POST['submitted']))
{
   if($registrationSite->login())
   {
        $registrationSite->redirectToURL("login-home.php");
   }
}

?>

<html>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<form id='login' action='<?php echo $registrationSite->getSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<?php echo $registrationSite->getErrorMessage(); ?></span></div>

Codename
<input type='text' name='codename' id='codename' value='<?php echo $registrationSite->safeDisplay('codename') ?>' maxlength="50" />

Password
<input type='password' name='password' id='password' maxlength="50" />

<input type='submit' name='submit' value='submit' />

<a href='reset-pwd-req.php'>Forgot Password?</a>

</form>

</body>
</html>