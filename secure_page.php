<?php
// sequential order applies to this as well, if we want to use our functions before the page displays anything
//we have to write THEM first, then any output statements.

/** if possible, any functions or code that will alter the header need to be written first in the document.
 *
* if we are unable to we must work with the output buffer to make sure that it goes according to plan.
* ob_start() will cause it to buffer all output until we tell it to stop, by calling ob_start_flush();
* then we are able to output page contents before the header changes.
 *
 * again see first sentence.
*/
// here if we echo hello before we make the function call, the function call fails.
require_once 'includes/utilities.php';
ob_start(); // add all code to the output buffer.
echo 'Hello world';
require_secure(); // this function is from the require_once statement.
ob_end_flush(); // stop adding things to the output buffer and flush it, this was all the header events have been handled.
