<?PHP
require_once("./include/registration.php");

if(!$registrationSite->checkLogin())
{
    $registrationSite->redirectToURL("login.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($registrationSite->changePassword())
   {
        $registrationSite->redirectToURL("changed-pwd.php");
   }
}

?>

<html>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<form id='changepwd' action='<?php echo $registrationSite->getSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<?php echo $registrationSite->getErrorMessage(); ?>

<input type="hidden" name="submitted" id="submitted" value="1"/>

<p>
Old Password <input type='password' name='oldpwd' id='oldpwd' maxlength="50" />
</p>

<p>
New Password <input type='password' name='password' id='password'' maxlength="50" />
</p>

<p>
Retype password <input type='password' name="password2" id="password2" maxlength="50" />
</p>

<input type='submit' name='submit' value='submit' />

</form>

</body>
</html>