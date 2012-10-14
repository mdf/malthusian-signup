<?php 

require_once("../include/registration.php");

if(isset($_POST['submitted']))
{
	if($registrationSite->adminRegistration())
	{
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../static/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="./static/bootstrap/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../static/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../static/bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../static/bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../static/bootstrap/ico/apple-touch-icon-57-precomposed.png">
    
    <script src="../static/jquery-1.8.1.js"></script>
    <script src="../static/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">

	</script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Admin</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="checkins.php">Checkins</a></li>
              <li><a href="assigntag.php">Assign Tag</a></li>
              <li class="active"><a href="#">Register Player</a></li>              
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
    	<h2>Register player</h2>
    	
    	<p>
		<form class="form-inline" id='dbreg' action='<?php echo $registrationSite->getSelfScript(); ?>' method='post' accept-charset='UTF-8'>
			<input type='hidden' name='submitted' id='submitted' value='1'/>
			<input class="input-medium" id="firstname" type="text" name="firstname" value="<?php echo $registrationSite->safeDisplay("firstname") ?>" placeholder="First name"/><br>
			<input class="input-medium" id="lastname" type="text" name="lastname" value="<?php echo $registrationSite->safeDisplay("lastname") ?>" placeholder="Last name"/><br>
 			<input class="input-medium" id="codename" type="text" name="codename" value="<?php echo $registrationSite->safeDisplay("codename") ?>" placeholder="Codename"/><br>
 			<input class="input-medium" id="email" type="text" name="email" value="<?php echo $registrationSite->safeDisplay("email") ?>" placeholder="Email"/><br>
 			<input class="input-medium" id="twitter" type="text" name="twitter" value="<?php echo $registrationSite->safeDisplay("twitter") ?>" placeholder="Twitter"/><br>
 			<input class="input-medium" id="mobile" type="text" name="mobile" value="<?php echo $registrationSite->safeDisplay("mobile") ?>" placeholder="Mobile"/><br>
 			<input class="input-medium" id="postcode" type="text" name="postcode" value="<?php echo $registrationSite->safeDisplay("postcode") ?>" placeholder="Postcode"/><br>
 			<input class="input-medium" id="password" type="text" name="password" value="<?php echo $registrationSite->safeDisplay("password") ?>" placeholder="Password / tag ID"/><br>
			<br>
			<input type="submit" value="Submit" />
		</form>

		<p><?php echo $registrationSite->getErrorMessage(); ?></p>
	</div> 
    

  </body>
</html>

