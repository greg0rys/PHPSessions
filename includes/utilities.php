<?php

/**
 * force the web browser to require HTTPS.
 * When the page is loaded a check to the server superglobal is done, if https isn't on
 * then the header causes code 302 redirection, to the same page but with HTTPS.
 * @return void
 */
function require_secure()
{
    if($_SERVER['HTTPS'] != "on"){
        header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    }
}
