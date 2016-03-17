<?php

// $Id$

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 **************************************************************************/

/**********
 * Timezone
 **********/
 
// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "Europe/Helsinki";

/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysqli"=MySQL
$dbsys = "mysqli";
// Hostname of database server.
$db_host = ".fi";
// Database name:
//$db_database = "mik";
// Database login user name:
//$db_login = "mik";
// Database login password:
//$db_password = 'xxxxxxxxx';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mikweb2_mrbs_";
// Uncomment this to NOT use PHP persistent (pooled) database connections:
// $db_nopersist = 1;


/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */

$typel["A"] = "Harjoituslento";
$typel["B"] = "Matkalento";
$typel["C"] = "Koululento";
$typel["D"] = "Huolto";
$typel["E"] = "Taitolento";
$typel["F"] = "SAR etsintä/pelastuslento";

unset($typel["I"]); // set in systemdefaults, unset.

$mrbs_admin = "admin";
$mrbs_admin_email = "tuomas.kuosmanen@gmail.com";

$mrbs_company = "Malmin Ilmailukerho ry";   // This line must always be uncommented ($mrbs_company is used in various places)

//$mrbs_company_logo = "your_logo.gif";    // name of your logo file.   This example assumes it is in the MRBS directory

// Uncomment this next line to have a link to your organisation in the header
$mrbs_company_url = "http://www.mik.fi/";
$url_base = "http://www.malminilmailukerho.net/jasenet/varauskirja/";

/* AUTENTIKOINTI - vaatii Wordpressiin "md5-passwords" -pluginin! */
$auth["session"] = "wpmiika"; // How to get and keep the user ID. One of
$auth["type"] = "wpmiika";
//$auth["type"] = "php"; // How to validate the user/password. One of "none"
$auth['db_ext']['db_system'] = 'mysql';
$auth['db_ext']['db_host'] = 'sql';
$auth['db_ext']['db_username'] = 'malminilma_web';
$auth['db_ext']['db_password'] = 'Phi3thae';
$auth['db_ext']['db_name'] = 'malminilma_db_web';
$auth['db_ext']['db_table'] = 'mikweb2_wp_users';
$auth['db_ext']['column_name_username'] = 'user_login';
$auth['db_ext']['column_name_password'] = 'user_pass';
$auth['db_ext']['password_format'] = 'md5';
$auth["admin"][] = "admin"; // A user name from the user list. Useful
                                    // with most other session schemes.


$weekstarts = 1;

// minimum block size = 30 minutes
$resolution = (30 * 60);

$morningstarts         = 7;   // must be integer in range 0-23
$morningstarts_minutes = 0;   // must be integer in range 0-59

// The beginning of the last slot of the day
$eveningends           = 22;  // must be integer in range 0-23
$eveningends_minutes   = 00;   // must be integer in range 0-59


// LOOK AND FEEL 
$theme = "mik";
$simple_trailer = FALSE;
$view_week_number = FALSE;
$row_labels_both_sides = TRUE;
$show_plus_link = TRUE;

$unicode_encoding = 1; 
$disable_automatic_language_changing = 1;
//$default_language_tokens = "en";
$default_language_tokens = "mik";

$override_locale = "fi_FI";

// Make sure notice errors are not reported, they can break mrbs code:
$error_level = E_ALL ^ E_NOTICE;
error_reporting ($error_level);

// HES
$db_password = 'mhxq78rh8q27r';
$db_host = ":/var/run/mysql/mysql.sock";

$auth["session"] = "ip";
$auth["type"] = "none";

// This next section must come at the end of the config file - ie after any
// language and mail settings, as the definitions are used in the included file
require_once "language.inc";   // DO NOT DELETE THIS LINE

?>
