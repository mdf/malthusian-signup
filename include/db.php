<?php

class DB
{
    var $username;
    var $pwd;
    var $database;
    var $connection;
    
    function DB()
    {
        $this->db_host  = 'localhost';
        $this->username = 'weareamb_?????';
        $this->pwd = '??????????';
        $this->database = 'weareamb_?????';    	
    }
    
    function connect(&$connection)
    {
        $this->connection = mysql_connect($this->db_host, $this->username, $this->pwd);

		if(!$this->connection)
		{   
			error_log("Database Login failed! Please make sure that the DB login credentials provided are correct");
			return false;
		}
		
		if(!mysql_select_db($this->database, $this->connection))
        {
            error_log('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
			return false;
        }
        
        if(!mysql_query("SET NAMES 'UTF8'",$this->connection))
        {
            error_log('Error setting utf8 encoding');
            return false;
        }
        
        $connection = $this->connection;
            	
    	return true;
    }
}


?>