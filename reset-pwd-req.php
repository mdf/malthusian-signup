<?PHP
require_once("./include/registration.php");

$emailsent = false;
if(isset($_POST['submitted']))
{
   if($registrationSite->emailResetPasswordLink())
   {
        $registrationSite->redirectToURL("reset-pwd-link-sent.php");
        exit;
   }
}

?>

<html>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<form id='resetreq' action='<?php echo $registrationSite->getSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<?php echo $registrationSite->getErrorMessage(); ?>

Enter the email address you registered with
<input type='text' name='email' id='email' value='<?php echo $registrationSite->safeDisplay('email') ?>' maxlength="50" />

<input name='submit' type='submit' class="date" value='submit' />

</form>

</body>
</html>