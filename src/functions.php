<?php

/**
 * Get the age from the specified user
 *
 * The next lines explain what the function does in detail.
 *
 * @param array $users
 * @param string $usnername
 *
 *
 *
 * return int|null
 */


function connect(){
    $iniData = parse_ini_file( __DIR__ . '/../etc/config.ini');
    $host=$iniData['Host'];
    $dbname= $iniData['dbname'];
    $username= $iniData['username'];
    $password= $iniData['password'];
    return new pdo("mysql:host=". $host.";  dbname=$dbname", $username, $password);

}

function escape($text)
{
    return htmlspecialchars($text, ENT_COMPAT, 'UTF-8');
}

