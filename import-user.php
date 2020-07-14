<?php
require_once __DIR__ . '/users.php';
require_once __DIR__ . '/functions.php';
$db = new PDO('mysql:host=localhost;  dbname=app', 'app', 'app');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($users as $user) {
    addUser($db, $user['username'], $user['password']);

}
addUser($db, 'lsd', 'asdasd');

