<?php
require_once __DIR__ . '/functions.php';
$db = new PDO('mysql:host=localhost;  dbname=app', 'app', 'app');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo 'username:';
$username = trim(fgets(STDIN), "\n");

echo 'password:';
$loginPassword = trim(fgets(STDIN), "\n");
$hashPassword = passwordHash($loginPassword);

addUser($db, $username, $hashPassword);
