<?php

/*
 * to destroy a session we must first
 * use session_destroy to destroy the session file stored in C:/xampp/tmp
 * then we must set the session cookie to empty.
 *
 * we must use ob_start(); and ob_end_flush
 */
ob_start(); // hold all this output below in a buffer until the header operations are complete
session_name("Greg"); // if we want to name our session something other than the defualt, set the name BEFORE session start.

session_start();
echo session_id() . '<br/>'; //value of the session id cookie
echo session_name() . '<br/>'; // the name the cookie uses. def PHPsessid can be changed in php.ini
$session_info = session_get_cookie_params();
echo '<pre>';
print_r($session_info);
echo '</pre>';

/*
 * STEP 1: clear the session object by setting to empty array
 */

$_SESSION = array();
// we clear out the current cookie in the session and replace it with new values.
setcookie(session_name(),
    '',
    0,
    $session_info['path'],
    $session_info['domain'],
    $session_info['secure'],
    $session_info['httponly']);
session_destroy(); // when this page is left destroy all the info we have about the session.
ob_end_flush(); // header operations are now done, flush the header out.