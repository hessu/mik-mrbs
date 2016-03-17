<?php
/*****************************************************************************
*
*   File name       auth_db_ext.inc
*
*   Description     Authenticate users from a table in another database.
*
*   Notes           To use this authentication scheme, set in config.inc.php:
*         $auth["type"]  = "wpmiika";
*                   Assumes passwords are stored in the other table in
*                   plaintext, authValidateUser() will need to be changed if
*                   the password is stored differently.
*
*   History
*    Available in the source control system
*
******************************************************************************/

// $Id: auth_db_ext.inc 1115 2009-05-28 22:23:30Z jberanek $

/* Path to Wordpress configuration file */
$wp_include="../wp-config.php";
require_once($wp_include);

date_default_timezone_set('Europe/Helsinki');
setlocale(LC_ALL, array('fi_FI.UTF-8','fi_FI@euro','fi_FI','finnish'));


/* authValidateUser($user, $pass)
 * 
 * Checks if the specified username/password pair are valid
 * 
 * $user  - The user name
 * $pass  - The password
 * 
 * Returns:
 *   0        - The pair are invalid or do not exist
 *   non-zero - The pair are valid
 */


function authValidateUser($user, $pass)
{
if (isset($_COOKIE['MIK_KERHOHUONE'])) return 1;
else return is_user_logged_in();
}

/* authGetUserLevel($user)
 * 
 * Determines the users access level
 * 
 * $user - The user name
 *
 * Returns:
 *   The users access level
 */
function authGetUserLevel($user)
{
/*
  global $auth;
  $admins = $auth['admin'];
  // User not logged in, user level '0'
  if(!isset($user))
  {
    return 0;
  }
*/

if (wp_get_current_user()->user_level >= 10) return 2;
else if (stripos(wp_get_current_user()->user_login,"huolto")!==false) return 2;
else if (!is_user_logged_in() and isset($_COOKIE['MIK_KERHOHUONE'])) return 0;
else return 1;

}

?>
