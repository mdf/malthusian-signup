<?php

require_once("../include/db.php");

$tag = $_POST['tag'];
$location = $_POST['location'];

$db = new DB();
$connection = null;
$db->connect($connection);

$sql = "insert into checkins (location, tag_id) value ('$location', '$tag')";
	
if (!mysql_query($sql, $connection))
{
	die('Error: ' . mysql_error());
}

?>