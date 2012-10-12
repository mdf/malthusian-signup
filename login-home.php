<?PHP
require_once("./include/registration.php");

if(!$registrationSite->checkLogin())
{
    $registrationSite->redirectToURL("login.php");
    exit;
}

?>

<html>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>
<h2>Home Page</h2>

<p>
Welcome back <?php echo $registrationSite->sessionCodename(); ?>
<p>

<p>
<a href='change-pwd.php'>Change password</a>
</p>

<p>
<a href='profile.php'>Your profile</a>
</p>

<p>
<a href='logout.php'>Logout</a>
</p>

</body>
</html>
