<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('malthusianparadox.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('mdf@cs.nott.ac.uk');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'malthusian',
                      /*password*/'malthusian',
                      /*database name*/'malthusian');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('ps14DM0qDLYqJYB');

?>