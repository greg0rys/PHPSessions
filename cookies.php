<?php
setcookie("my_new_cookie_two","timbo", time() - 60 * 60 *24 *7); //expires a week in the past.
setcookie("my_new_cookie", "some bullshit, who even knows.", time() + 60 * 60 * 24 * 7); //time + 1 week
echo 'hello world';
