<html>
<body>

<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("./login.php");
    exit;
}
?>

<h2>This is an Access Controlled Page</h2>
<p>
Logged in as: <?php $fgmembersite->UserFullName() ?>
</p>
<p>
<a href="./login-home.php">home</a>
</p>

</body>
</html>
