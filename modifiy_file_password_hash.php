<!--This is a copy of modify file, but using password hashing
WE NEVER SEND PASSWORDS on a connection that isn't https.
so we will require once our secure conneciton function and then do something with the values.
-->
<?php
require_once('includes/utilities.php');
require_once('includes/constants.php');

require_secure(); // we only send passwords via HTTPS so force the user to use HTTPS

$key = isset($_POST['key']) ? $_POST['key'] : NULL;
$value = isset($_POST['value']) ? $_POST['value'] : NULL;


if(!empty($key) && !empty($value)){
    // the password hash function will take the value from the form which is the password and hash it by the PASSWORD_DEFAULT algo
    // then it will be stored as a hash in our CSV
    // we wrap the username in htmlentities to ensure that value is always stored safely to be used in HTML output later.
    update_file_passwords(htmlentities($key),password_hash($value, PASSWORD_DEFAULT));
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
    <form method ="POST" action="modifiy_file_password_hash.php">
        <label> Username
            <input type="text" name="key"/>
        </label><br>

        <label> Password
            <input type ="password" name="value"/>
        </label><br>
            <input type= "submit" name="SUBMIT">

    </form>
</body>
</html>
