<?php

function dob_selector()
{
	$month = date("m");
	$day = date("d");
	$year = date("Y") - 18;
	
	$dob = "<select name=\"day\">";
	
	for($i = 1; $i <= 31; $i++)
	{
		if($day==$i)
		{
			$sel = " selected=\"selected\"";
		}
		else 
		{
			$sel = "";
		}
		
		$dob .= "<option value=\"".$i."\"".$sel.">".$i."</option>"; 
	}
	
	$dob .= "</select>";
	
	$dob .= "<select name=\"month\">";
	
	for($i = 1; $i <= 12; $i++)
	{
		if($month==$i)
		{
			$sel = " selected=\"selected\"";
		}
		else 
		{
			$sel = "";
		}
		
		$dob .= "<option value=\"".$i."\"".$sel.">".$i."</option>"; 
	}
	
	$dob .= "</select>";
	
	$dob .= "<select name=\"year\">";
	
	for($i = $year; $i >= $year-100; $i--)
	{
		if($year==$i)
		{
			$sel = " selected=\"selected\"";
		}
		else 
		{
			$sel = "";
		}
		
		$dob .= "<option value=\"".$i."\"".$sel.">".$i."</option>"; 
	}
	
	$dob .= "</select>";

	return $dob;
}

?>