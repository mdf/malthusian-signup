<?PHP
require_once("./include/membersite_config.php");

if(isset($_GET['code']))
{
   if($fgmembersite->ConfirmUser())
   {
        $fgmembersite->RedirectToURL("thank-you-regd.php");
   }
}

?>

<html>
<body>

<p>
Please enter the confirmation code in the box below
</p>

<form id='confirm' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>

<?php echo $fgmembersite->GetErrorMessage(); ?>

Confirmation Code
<input type='text' name='code' id='code' maxlength="50" /><br/>

<input type='submit' name='submit' value='submit' />

</form>

</body>
</html>