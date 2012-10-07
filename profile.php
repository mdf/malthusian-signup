<html>
<body>

<?PHP
require_once("./include/registration.php");

if(!$registrationSite->checkLogin())
{
    $registrationSite->redirectToURL("./login.php");
    exit;
}
?>

<h2>Profile</h2>
<p>
Logged in as: <?php echo $registrationSite->sessionCodename(); ?><br>
Email: <?php echo $registrationSite->sessionEmail(); ?><br>
pid: <?php echo $registrationSite->sessionPid(); ?><br>
tag: <img src="qrcache/?id=<?php echo $registrationSite->sessionTag(); ?>"><br>
</p>
<p>
<a href="./login-home.php">home</a>
</p>

</body>
</html>
