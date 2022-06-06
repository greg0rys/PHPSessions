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

function update_file($key,$value){
    $file = fopen('data/my_file.csv', 'r+'); // r+ means we can read and write the file if we want.
    flock($file, LOCK_EX); // lock the file since many users could be accessing the file at one time. This will only allow for one user to read or write the file
    // at a time, once one user is done, then it will allow the next. This ensures that each user gets the most up to date file with accurate data.

    // this array holds each line of data inside the file, since a CSV is key value pairs we use an associatve array
     $contents = [];

     // use a do loop to go through files, this way we always loop at least once to see if the file is empty
    do {
        $line = fgetcsv($file);
        // if $line is true that means this is not the end of the file, if else its false and we will break.
        if(!$line){
            break;
        }

        // if line is true then we will store each value of the file in our array. using the the key from the csv and its value.
        $contents[$line[KEY_FIELD]] = $line; // we use 0 for the key_field as each new line is a new array item one is zero item two is one.
    } while($line);

    $contents[$key] = [$key,$value];
    ftruncate($file, 0); // set the file to 0 to rewrite it if new values are supplied for the keys
    rewind($file); // rewind the file pointer back to the start of the file.

    foreach($contents as $line):
        fputcsv($file, $line);
    endforeach;

    flock($file, LOCK_UN); // unlock the file now that we have reached the end of it and performed any updates we want.
    fclose($file); // close the file on this end.
}
