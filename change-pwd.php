<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->ChangePassword())
   {
        $fgmembersite->RedirectToURL("changed-pwd.php");
   }
}

?>

<html>
<body>

<form id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<?php echo $fgmembersite->GetErrorMessage(); ?>

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