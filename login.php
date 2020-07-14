<?php

require_once __DIR__ . '/functions.php';
// Read username from CLI (if not given as script argument)
// Read password from CLI
// Test login
// If login successful write "Login succeeded"
// If not ask the user to input username/password again
$db = new PDO('mysql:host=localhost;  dbname=app', 'app', 'app');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$zaehler = 3;
while ($zaehler > 0) {
    echo 'username: ';
    //get the username
    $loginName = trim(fgets(STDIN), "\n");
    echo 'password: ';
    //get the password
    $loginPassword = trim(fgets(STDIN), "\n");
    //check whether the password matches the username
    if (dbLogin($db, $loginName, $loginPassword)) {
        echo ' richtig';
        break;
    }
    $zaehler--;
    echo "$zaehler attempts left \n";
}

if ($zaehler === 0) {
    echo 'Too many attempts';
}
