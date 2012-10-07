<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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

	function update()
	{
		$.get("../api/get_checkins.php", function(data) {
			var items = [];
			var json = (jQuery.parseJSON(data));
			if(json!=null)
			{
				var newcheckin = "<div>"
				
				for(var i=0; i<json.length; i++)
				{
					var c = json[i];
					newcheckin += "<p>" + c.timestamp + " " + c.location + " " + c.tag_id + "/" + c.player_id + "</p>";
				}
	
				newcheckin+= "</div>"
	
				$("#checkins").html(newcheckin);
			}
	
		});
	
		var t = setTimeout("update()", 5000);
		
	}

	$(function()
	{
		$("#postform").submit(function(e) {
			e.preventDefault();	
			$("#post_response").html("working");
			$.post("../api/do_checkin.php", $("#postform").serialize(),
				function(data)
				{
					$("#post_response").html("done");
				}, "json");
		});
	});
	</script>
  </head>

  <body onload="update()">

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
              <li class="active"><a href="#">Checkins</a></li>
              <li><a href="assigntag.php">Assign Tag</a></li>
              <li><a href="registerplayer.php">Register Player</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
		<h2>Test Checkin</h2>
		<form class="form-inline" id="postform">
			<input class="input-small" id="location" type="text" name="location" placeholder="Location"/>
			<input class="input-small" id="tag" type="text" name="tag" placeholder="Tag"/>
			<input type="submit" value="Submit" />
			<label class="checkbox" id="post_response"></label>
		</form>
		<h2>Checkins</h2>
		<div id="checkins"></div>
	</div> 
    

  </body>
</html>
