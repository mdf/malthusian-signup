<?PHP
/*
    Registration/Login script from HTML Form Guide
    V1.0

    This program is free software published under the
    terms of the GNU Lesser General Public License.
    http://www.gnu.org/copyleft/lesser.html
    

This program is distributed in the hope that it will
be useful - WITHOUT ANY WARRANTY; without even the
implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.

For updates, please visit:
http://www.html-form-guide.com/php-form/php-registration-form.html
http://www.html-form-guide.com/php-form/php-login-form.html

*/
require_once("class.phpmailer.php");
require_once("formvalidator.php");
require_once("templates/text.php");
require_once("db.php");

class RegistrationSite
{
    var $from_address;
    var $from_name;
   
    var $connection;
    
    var $rand_key;
    
    var $error_message;
    
    
    function RegistrationSite()
    {
        $this->sitename = 'malthusianparadox.com';
        $this->rand_key = 'ps14DM0qDLYqJYB';
        
        $this->from_address = 'no-reply@malthusianparadox.com';
        $this->from_name = 'malthusian paradox';
    }
    
    
    function registerUser()
    {
        $regvars = array();
        $demovars = array();
        $consentvars = array();
        
        if(!$this->validateRegistrationSubmission())
        {
            return false;
        }
        
        $this->getRegistrationFields($regvars);
        $this->getDemographicFields($demovars);
        $this->getConsentFields($consentvars);
        
        if(!$this->saveRegistrationDB($regvars, $demovars, $consentvars, false, null))
        {
            return false;
        }
        
        if(!$this->sendUserConfirmationEmail($regvars['email'], $regvars['codename'], $regvars['confirmcode']))
        {
            return false;
        }
        
        return true;
    }
    
    function getDemographicFields(&$demovars)
    {
    	for($i=1; $i<=8; $i++)
    	{
    		if(array_key_exists($i, $_SESSION['player_info']['demographics']))
    		{
    			$demovars[$i] = $_SESSION['player_info']['demographics'][$i];
    		}
    		else
    		{
    			$demovars[$i] = null;
    		}
    	}
    }
    
    function getConsentFields(&$consentvars)
    {
		for($i=1; $i<=4; $i++)
    	{
    		if(array_key_exists($i, $_SESSION['player_info']['consent']))
    		{
    			if($_SESSION['player_info']['consent'][$i] == "true")
    			$consentvars[$i] = 1;
    		}
    		else
    		{
    			$consentvars[$i] = 0;
    		}
    	}    	
    }
    
    function getRegistrationFields(&$regvars)
    {
		$regvars['firstname'] = $this->sanitize($_POST['firstname']);
		$regvars['lastname'] = $this->sanitize($_POST['lastname']);
		$regvars['codename'] = $this->sanitize($_POST['codename']);
		$regvars['email'] = $this->sanitize($_POST['email']);
		$regvars['twitter'] = $this->sanitize($_POST['twitter']);
		$regvars['postcode'] = $this->sanitize($_POST['postcode']);
		$regvars['mobile'] = $this->sanitize($_POST['mobile']);
		$regvars['password'] = $this->sanitize($_POST['password']);
		$regvars['password2'] = $this->sanitize($_POST['password2']);
    }
    

    function confirmUser()
    {
        if(empty($_GET['code'])||strlen($_GET['code'])<=10)
        {
            $this->handleError(MP_ERR_CONFIRM_EMPTY);
            return false;
        }
        
        $user_rec = array();
        
        if(!$this->updateDBRecForConfirmation($user_rec))
        {
            return false;
        }
        
        return true;
    }    
    
    function login()
    {
        if(empty($_POST['codename']))
        {
            $this->handleError(MP_ERR_LOGIN_CODENAME_EMPTY);
            return false;
        }
        
        if(empty($_POST['password']))
        {
            $this->handleError(MP_ERR_LOGIN_PASSWORD_EMPTY);
            return false;
        }
        
        $codename = trim($_POST['codename']);
        $password = trim($_POST['password']);
        
        if(!isset($_SESSION))
        {
        	session_start();
        }
        
        if(!$this->checkLoginInDB($codename, $password))
        {
            return false;
        }
        
        $_SESSION[$this->getLoginSessionVar()] = $codename;
        
        return true;
    }
    
    function checkLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->getLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
    
    function sessionCodename()
    {
        return isset($_SESSION['player_codename'])?$_SESSION['player_codename']:'';
    }
    
    function sessionEmail()
    {
        return isset($_SESSION['player_email'])?$_SESSION['player_email']:'';
    }
    
    function sessionPid()
    {
        return isset($_SESSION['player_id'])?$_SESSION['player_id']:'';
    }
    
    function sessionTag()
    {
        return isset($_SESSION['player_tag'])?$_SESSION['player_tag']:'';
    }
    
    
    function logout()
    {
        session_start();
        
        $sessionvar = $this->getLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
    
    function emailResetPasswordLink()
    {
        if(empty($_POST['email']))
        {
            $this->handleError(MP_ERR_RESET_EMAIL_EMPTY);
            return false;
        }
        
        $user_rec = array();
        
        if(false === $this->getUserFromEmail($_POST['email'], $user_rec))
        {
            return false;
        }
        
        if(false === $this->sendResetPasswordEmail($user_rec))
        {
            return false;
        }
        
        return true;
    }
    
    function resetPassword()
    {
        if(empty($_GET['email']))
        {
            $this->handleError(MP_ERR_RESET_EMAIL_EMPTY);
            return false;
        }
        if(empty($_GET['code']))
        {
            $this->handleError(MP_ERR_RESET_CODE_EMPTY);
            return false;
        }
        $email = trim($_GET['email']);
        $code = trim($_GET['code']);
        
        if($this->getResetPasswordCode($email) != $code)
        {
            $this->handleError(MP_ERR_RESET_CODE_ERROR);
            return false;
        }
        
        $user_rec = array();
        if(!$this->getUserFromEmail($email,$user_rec))
        {
            return false;
        }
        
        $new_password = $this->resetUserPasswordInDB($user_rec);
        
        if(false == $new_password || empty($new_password))
        {
            $this->handleError(MP_ERR_RESET_UPDATE_ERROR);
            return false;
        }
        
        if(false == $this->sendNewPasswordEmail($new_password, $user_rec))
        {
        	$this->handleError(MP_ERR_EMAIL);
        	return false;
        }
        
        return true;
    }
    
    function changePassword()
    {
        if(!$this->CheckLogin())
        {
            $this->handleError(MP_ERR_RESET_LOGIN);
            return false;
        }
        
        if(empty($_POST['oldpwd']))
        {
            $this->handleError(MP_ERR_RESET_OLDPASSWORD_EMPTY);
            return false;
        }
        
        if(empty($_POST['password']))
        {
            $this->handleError(MP_ERR_RESET_NEWPASSWORD_EMPTY);
            return false;
        }
        
        $user_rec = array();
        
        if(!$this->getUserFromEmail($this->sessionEmail(),$user_rec))
        {
            return false;
        }
        
        $pwd = trim($_POST['oldpwd']);
        
        if($user_rec['password'] != md5($pwd))
        {
            $this->handleError(MP_ERR_RESET_OLDPASSWORD_ERR);
            return false;
        }
        
        if($_POST['password'] != $_POST['password2'])
        {
			$this->handleError(MP_ERR_RESET_PASSWORD_MATCH);
            return false;
        }
        
        $newpwd = trim($_POST['password']);
        
        if(!$this->changePasswordInDB($user_rec, $newpwd))
        {
            return false;
        }
        return true;
    }
    
    function getSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
    
    function safeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
    
    function redirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
    
    function getErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }
        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    }
    
    function handleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
    
    function handleDBError($err)
    {
        error_log($err . " " . mysql_error());
        $this->handleError(MP_ERR_DB);
    }
    
    
    function getLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }
    
    function checkLoginInDB($codename,$password)
    {
        if(!$this->dBLogin())
        {
            $this->handleError(MP_ERR_DB);
            return false;
        }   
               
        $codename = $this->sanitizeForSQL($codename);
        $pwdmd5 = md5($password);
        
        $qry = "select id,codename,email from player where codename='$codename' and password='$pwdmd5' and confirmcode='y'";
        
        $result = mysql_query($qry, $this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->handleError(MP_ERR_LOGIN_PASSWORD_ERR);
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
                
        $_SESSION['player_id'] = $row['id'];
        $_SESSION['player_codename'] = $row['codename'];
        $_SESSION['player_email'] = $row['email'];
        
        $pid = $row['id'];
        
        $qry = "select tag_id from player_tag where player_id='$pid'";
        
        $result = mysql_query($qry, $this->connection);
        
		if(!$result || mysql_num_rows($result) <= 0)
        {

        }
        
        $row = mysql_fetch_assoc($result);
        
        $_SESSION['player_tag'] = $row['tag_id'];
        
        return true;
    }
    
    function updateDBRecForConfirmation(&$user_rec)
    {
        if(!$this->dBLogin())
        {
            $this->handleError(MP_ERR_DB);
            return false;
        }   
        $confirmcode = $this->sanitizeForSQL($_GET['code']);
        
        $result = mysql_query("select id from player where confirmcode='$confirmcode'", $this->connection);   
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->handleError(MP_ERR_CONFIRM_ERROR);
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
        
        $qry = "update player set confirmcode='y' where confirmcode='$confirmcode'";
        
        if(!mysql_query($qry, $this->connection))
        {
            $this->handleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }      
        return true;
    }
    
    function resetUserPasswordInDB($user_rec)
    {
        $new_password = substr(md5(uniqid()),0,10);
        
        if(false == $this->changePasswordInDB($user_rec,$new_password))
        {
            return false;
        }
        return $new_password;
    }
    
    function changePasswordInDB($user_rec, $newpwd)
    {   	
        $newpwd = $this->sanitizeForSQL($newpwd);
        
        $qry = "update player set password='".md5($newpwd)."' Where id=".$user_rec['id']."";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->handleDBError("Error updating the password \nquery:$qry");
            return false;
        }     
        return true;
    }
    
    function getUserFromEmail($email,&$user_rec)
    {
        if(!$this->dBLogin())
        {
            $this->handleError(MP_ERR_DB);
            return false;
        }   
        $email = $this->sanitizeForSQL($email);
        
        $result = mysql_query("select * from player where email='$email'",$this->connection);  

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->handleError(MP_ERR_DB_GETUSER);
            return false;
        }
        
        $user_rec = mysql_fetch_assoc($result);

        return true;
    }
    
    function getResetPasswordCode($email)
    {
       return substr(md5($email.$this->sitename.$this->rand_key),0,10);
    }
    
    function sendNewPasswordEmail($new_password, $user_rec)
    {
        $email = $user_rec['email'];
        $codename = $user_rec['codename'];
        
    	$mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email, $codename);
        
        $mailer->Subject = MP_PASSWORD_NEW_SUBJECT;

        $mailer->From = $this->from_address; 
        $mailer->FromName = $this->from_name;       
        
		$login_url = $this->getAbsoluteURLFolder().'/login.php'.
        
		$body = "";
        $body = file_get_contents("./include/templates/newpassword.txt");
        $body = str_replace("MP_CODENAME", $codename, $body);
        $body = str_replace("MP_LOGIN_URL", $login_url, $body);
        $body = str_replace("MP_PASSWORD", $new_password, $body);
        
        $mailer->Body = $body;
        
        //echo "<pre> $mailer->Body </pre>";
        
        if(!$mailer->Send())
        {
            $this->handleError(MP_ERR_EMAIL);
            return false;
        }
        return true;
    }
    
    function sendResetPasswordEmail($user_rec)
    {
        $email = $user_rec['email'];
        $codename = $user_rec['codename'];
        
    	$mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email, $codename);
        
        $mailer->Subject = MP_PASSWORD_RESET_SUBJECT;

        $mailer->From = $this->from_address; 
        $mailer->FromName = $this->from_name;       
        
		$reset_url = $this->getAbsoluteURLFolder().'/resetpwd.php?email='.
			urlencode($email).'&code='.
			urlencode($this->getResetPasswordCode($email));
        
		$body = "";
        $body = file_get_contents("./include/templates/reset.txt");
        $body = str_replace("MP_CODENAME", $codename, $body);
        $body = str_replace("MP_PASSWORDURL", $reset_url, $body);
        
        $mailer->Body = $body;
        
        if(!$mailer->Send())
        {
            $this->handleError(MP_ERR_EMAIL);
            return false;
        }
        
        return true;
    }
    
    
    function validateRegistrationSubmission()
    {        
        $validator = new FormValidator();
        $validator->addValidation("firstname","req",MP_ERR_REG_FN);
        $validator->addValidation("lastname","req",MP_ERR_REG_LN);
        $validator->addValidation("email","email",MP_ERR_REG_EMAIL_ERR);
        $validator->addValidation("email","req",MP_ERR_REG_EMAIL);
        $validator->addValidation("mobile","mobile",MP_ERR_REG_MOBILE_ERR);
        $validator->addValidation("mobile","req",MP_ERR_REG_MOBILE);
        $validator->addValidation("codename","req",MP_ERR_REG_CODENAME);
        $validator->addValidation("password","req",MP_ERR_REG_PASSWORD);
        $validator->addValidation("password","eqelmnt=password2",MP_ERR_REG_PASSWORD_ERR);

        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error = $inpname.':'.$inp_err."\n";
            }
            $this->handleError($error);
            return false;
        }        
        return true;
    }
   

    function sendUserConfirmationEmail($email, $codename, $confirmcode)
    {
    	$mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email, $codename);
        
        $mailer->Subject = MP_EMAIL_CONFIRMATION_SUBJECT;

        $mailer->From = $this->from_address; 
        $mailer->FromName = $this->from_name;       
        
        $confirm_url = $this->getAbsoluteURLFolder().'/confirmreg.php?code='.$confirmcode;
        
        $body = "";
        $body = file_get_contents("./include/templates/welcome.txt");
        $body = str_replace("MP_CODENAME", $codename, $body);
        $body = str_replace("MP_CONFIRMURL", $confirm_url, $body);
        
        $mailer->Body = $body;
        
        if(!$mailer->Send())
        {
            $this->handleError(MP_ERR_EMAIL);
            return false;
        }
        
        return true;
    }
    
    
    function getAbsoluteURLFolder()
    {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
        $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
        return $scriptFolder;
    }
    
    function assignTag()
    {
        if(!$this->dBLogin())
        {
            $this->handleError(MP_ERR_DB);
            return false;
        }
        
		$user_rec = array();
        
        if(false === $this->getUserFromEmail($_POST['email'], $user_rec))
        {
            return false;
        }
        
        $pid = $user_rec['id'];
        $tagid = $_POST['tag'];
        
		// assign tag to player
		$insert_query = "insert into player_tag(tag_id, player_id) values($tagid, $pid)";

		if(!mysql_query($insert_query, $this->connection))
        {
            $this->handleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }

    	$this->handleError("Done");
    }
    
  
    function saveRegistrationDB(&$regvars, &$demovars, &$consentvars, $assignTag, $tagid)
    {		
        if(!$this->dBLogin())
        {
            $this->handleError(MP_ERR_DB);
            return false;
        }
        
        if(!$this->isFieldUnique($regvars,'email'))
        {
            $this->handleError(MP_ERR_REG_EMAIL_DUP);
            return false;
        }
        
        if(!$this->isFieldUnique($regvars,'codename'))
        {
            $this->handleError(MP_ERR_REG_CODENAME_DUP);
            return false;
        }
        
        // player
		$confirmcode = $this->makeConfirmationMd5($regvars['email']);
		$regvars['confirmcode'] = $confirmcode;
		
		$insert_query = "insert into player(firstname, lastname, codename, email, twitter, postcode, mobile, password, confirmcode)
			values
			(
			'" . $this->sanitizeForSQL($regvars['firstname']) . "',
			'" . $this->sanitizeForSQL($regvars['lastname']) . "',
			'" . $this->sanitizeForSQL($regvars['codename']) . "',
			'" . $this->sanitizeForSQL($regvars['email']) . "',
			'" . $this->sanitizeForSQL($regvars['twitter']) . "',
			'" . $this->sanitizeForSQL($regvars['postcode']) . "',
			'" . $this->sanitizeForSQL($regvars['mobile']) . "',
			'" . md5($regvars['password']) . "',
			'" . $confirmcode . "'
			)";
        
        if(!mysql_query($insert_query, $this->connection))
        {
            $this->handleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }
        
        $pid = mysql_insert_id();
        
        // create and assign a tag
        if($assignTag == false || $tagid == null)
        {
	        $insert_query = "insert into tag(id) values(null)";
	
			if(!mysql_query($insert_query, $this->connection))
	        {
	            $this->handleDBError("Error inserting data to the table\nquery:$insert_query");
	            return false;
	        }
	        
	        $tagid = mysql_insert_id();
        }
        else
        {
        	// create and assign existing tag
	        $insert_query = "insert into tag(id) values($tagid)";
	
			if(!mysql_query($insert_query, $this->connection))
	        {
	            $this->handleDBError("Error inserting data to the table\nquery:$insert_query");
	            return false;
	        }     	
        }

        // assign tag to player
		$insert_query = "insert into player_tag(tag_id, player_id) values($tagid, $pid)";

		if(!mysql_query($insert_query, $this->connection))
        {
            $this->handleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }

        // player demographics and consent
		$insert_query = "insert into player_info(player_id, q1, q2, q3, q4, q5, q6, q7, q8, c1, c2, c3, c4)
			values
			(
			'" . $pid . "',
			'" . $this->sanitizeForSQL($demovars[1]) . "',
			'" . $this->sanitizeForSQL($demovars[2]) . "',
			'" . $this->sanitizeForSQL($demovars[3]) . "',
			'" . $this->sanitizeForSQL($demovars[4]) . "',
			'" . $this->sanitizeForSQL($demovars[5]) . "',
			'" . $this->sanitizeForSQL($demovars[6]) . "',
			'" . $this->sanitizeForSQL($demovars[7]) . "',
			'" . $this->sanitizeForSQL($demovars[8]) . "',
			'" . $this->sanitizeForSQL($consentvars[1]) . "',
			'" . $this->sanitizeForSQL($consentvars[2]) . "',
			'" . $this->sanitizeForSQL($consentvars[3]) . "',
			'" . $this->sanitizeForSQL($consentvars[4]) . "'
			)";

		if(!mysql_query($insert_query, $this->connection))
        {
            $this->handleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }		
        
        return true;
    }
    
    function isFieldUnique($formvars,$fieldname)
    {
        $field_val = $this->sanitizeForSQL($formvars[$fieldname]);
        $qry = "select * from player where $fieldname='".$field_val."'";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    
    function dBLogin()
    {
    	$db = new DB();
    	return $db->connect($this->connection);
    }    
    
    
	function makeConfirmationMd5($email)
	{
		$randno1 = rand();
		$randno2 = rand();
		return md5($email . $this->rand_key . $randno1 . '' . $randno2);
	}
    
    
	function sanitizeForSQL($str)
	{
		if(function_exists("mysql_real_escape_string"))
		{
			$ret_str = mysql_real_escape_string( $str );
		}
		else
		{
			$ret_str = addslashes($str);
		}
		return $ret_str;
	}
    

	function sanitize($str,$remove_nl=true)
	{
		$str = $this->stripSlashes($str);

		if($remove_nl)
		{
			$injections = array('/(\n+)/i',
				'/(\r+)/i',
				'/(\t+)/i',
				'/(%0A+)/i',
				'/(%0D+)/i',
				'/(%08+)/i',
				'/(%09+)/i'
				);
			$str = preg_replace($injections,'',$str);
		}

		return $str;
    }
    

	function stripSlashes($str)
	{
		if(get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}
		return $str;
	}    
}

$registrationSite = new RegistrationSite();

?>