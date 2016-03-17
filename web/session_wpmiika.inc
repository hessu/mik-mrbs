<?php 
/********************************************************************************************\
*                                                                                            *
*   File name       session_remote_user.inc                                                  *
*                                                                                            *
*   Description     Get user identity/password using the REMOTE_USER environment variable.   *
*                   Both identity and password equal the value of REMOTE_USER.               *
*                                                                                            *
*   Notes           To use this session scheme, set in config.inc.php:                       *
*                     $auth['session']  = 'remote_user';                                     *
*                     $auth['type'] = 'none';                                                *
*                                                                                            *
*                                                                                            *
*                   If you want to display a login link, set in config.inc.php:              *
*                     $auth['remote_user']['login_link'] = '/login/link.html';               *
*                                                                                            *
*                   If you want to display a logout link, set in config.inc.php:             *
*                     $auth['remote_user']['logout_link'] = '/logout/link.html';             *
*                                                                                            *
*   History                                                                                  *
*    2006-01-04 Bjorn.Wiberg@its.uu.se  Created based on session_http.inc                    *
*    2006-02-16 Bjorn.Wiberg@its.uu.se  Made logout link a configuration item                *
*                                                                                            *
\*********************************************************************************************/

// $Id: session_remote_user.inc 1220 2009-10-18 15:35:24Z jberanek $

$wp_include="../wp-config.php";
require_once($wp_include);

date_default_timezone_set('Europe/Helsinki');
setlocale(LC_ALL, array('fi_FI.UTF-8','fi_FI@euro','fi_FI','finnish'));


/* authGet()
 * 
 * Request the user name/password
 * 
 * Returns: Nothing
 */
function authGet()
{
  // User is expected to already be authenticated by the web server, so do nothing
}

function getUserName()
{
if (!is_user_logged_in())
{


if (isset($_COOKIE['MIK_KERHOHUONE'])) return "MIK Kerhohuone";


$apu=wp_login_url("/varauskirja");

echo <<<EOQ
<a href="{$apu}">LOGIN</a>
<a href="/">P&auml;&auml;sivulle</a>
EOQ;
exit();
}

else return wp_get_current_user()->user_login;
}

// Print the logon entry on the top banner.
function PrintLogonBox()
{
/*
  global $user_list_link, $day, $month, $year;
  global $auth;
*/  
  $user = getUserName();

  if (is_user_logged_in())
  {
$apu=wp_logout_url("/varauskirja");



echo <<<EOQ
{$user}<br>
<a href="{$apu}">LOGOUT</a>
<a href="/">P&auml;&auml;sivulle</a>
EOQ;

}
  else
{
$apu=wp_login_url("/varauskirja");

echo <<<EOQ
<a href="{$apu}">LOGIN</a>
<a href="/">P&auml;&auml;sivulle</a>
EOQ;

}
}


?>
