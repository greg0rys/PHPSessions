<?php
require_once('includes/utilities.php');
require_once('includes/constants.php');
/*
 * Get the new values from the form
 *
 */

// if no data was supplied to the form fields, then the keys will be set to null,
// and it will not execute the statements to update the file.
$key = isset($_POST['key']) ? $_POST['key'] : NULL;
$value = isset($_POST['value']) ? $_POST['value'] : NULL;

/*
 * if the keys are set from form fields, then we will write them to our csv.
 */
if(!empty($key) && !empty($value)){
    update_file($key,$value);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method ="POST" action="modifiy_file.php">
        <label> Key
            <input type="text" name="key"/>
        </label><br>

        <label> Value
            <input type ="text" name="value"/>
        </label><br>
            <input type= "submit" name="SUBMIT">

    </form>
</body>
</html>
