<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("login-home.php");
   }
}

?>

<html>
<body>

<form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

UserName
<input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" />

Password
<input type='password' name='password' id='password' maxlength="50" />

<input type='submit' name='submit' value='submit' />

<a href='reset-pwd-req.php'>Forgot Password?</a>

</form>

</body>
</html>