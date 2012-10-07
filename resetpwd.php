<?PHP
require_once("./include/registration.php");

$success = false;

if($registrationSite->resetPassword())
{
    $success=true;
}

?>

<html>
<body>

<?php
if($success){
?>
<h2>Password is Reset Successfully</h2>
Your new password has been sent to your email address.
<?php
}else{
?>
<h2>Error</h2>
<?php echo $registrationSite->getErrorMessage(); ?>
<?php
}
?>
</div>

</body>
</html>