<?PHP
require_once("./include/membersite_config.php");

$success = false;
if($fgmembersite->ResetPassword())
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
Your new password is sent to your email address.
<?php
}else{
?>
<h2>Error</h2>
<?php echo $fgmembersite->GetErrorMessage(); ?>
<?php
}
?>
</div>

</body>
</html>