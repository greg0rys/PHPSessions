<?php

/*
 * Sessions can be used to save state on the server
 * if we want to have a session remember anything about a current users current browsing session
 * we can simply add them to the $_SESSION super global as key value,
 * and then any page that calls session_start() will be able to access them.
 *
 * For example we are storing this array in the session, any other page
 * in this project can call session start and then get the value for this
 * array.
 * This can be used to update login status etc.
 *
 * for it to avaliable to all pages, it must call session.start();
 */
session_start(); // if a cookie with a session id is passed here then it will return a previous session.

$_SESSION['my_array'] = ['kiwi', 'strawberry', 'apple', 'pear'];
$_SESSION['logged_in'] = 'true';
$_SESSION['name'] = "Greg";
print_r($_SESSION['name']);

echo "Hello world";

?>


