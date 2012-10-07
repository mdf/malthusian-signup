<?php

require_once("../include/db.php");

$db = new DB();
$connection = null;
$db->connect($connection);

$sql = "select * from checkins order by timestamp desc limit 100";

$rows = array();
$res = mysql_query($sql, $connection);
	
while($r = mysql_fetch_assoc($res))
{
	$rows[] = $r;
}
	
echo json_encode($rows);

?>