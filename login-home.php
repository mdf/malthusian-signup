<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>

<html>
<body>
<h2>Home Page</h2>

<p>
Welcome back <?= $fgmembersite->UserFullName(); ?>!
<p>

<p>
<a href='change-pwd.php'>Change password</a>
</p>

<p>
<a href='access-controlled.php'>A sample 'members-only' page</a>
</p>

<p>
<a href='logout.php'>Logout</a>
</p>

</body>
</html>
