<?PHP
require_once("./include/registration.php");

if(isset($_GET['code']))
{
   if($registrationSite->confirmUser())
   {
        $registrationSite->redirectToURL("thank-you-regd.php");
   }
}

?>

<html>
<body>

<p>
Please enter the confirmation code in the box below
</p>

<form id='confirm' action='<?php echo $registrationSite->getSelfScript(); ?>' method='get' accept-charset='UTF-8'>

<?php echo $registrationSite->getErrorMessage(); ?>

Confirmation Code
<input type='text' name='code' id='code' maxlength="50" /><br/>

<input type='submit' name='submit' value='submit' />

</form>

</body>
</html>