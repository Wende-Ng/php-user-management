<?php

require_once __DIR__ . '/users.php';
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

function getAge($users, $username)
{
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user['age'];
        }
    }

    return null;
}

function echoSomething($someThing)
{
    echo $someThing . PHP_EOL;
}

function checkLogin($users, $username, $password)
{
    foreach ($users as $value) {
        if ($value['username'] === $username
            && $value['password'] === $password
        ) {
            return true;
        }
    }
    return false;
}

function dbLogin($pdo, $username, $password)
{
    $statement = $pdo->prepare("SELECT * FROM user WHERE username = ?");
    $statement->execute(array($username));
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user !== false) {
        if ( hashVerify($password, $user['password'])) {
            return true;
        }
    }

    return false;
}

function passwordHash($password){
    return $hash = password_hash($password, PASSWORD_DEFAULT);
}

function hashVerify($password, $hash){
    return password_verify($password, $hash);
}
function addUser($pdo, $username, $Vorname, $Nachname, $e_mail,$password){
    $statement = $pdo->prepare("insert into user (username, Vorname, Nachname,e_mail, password) values(?,?,?,?,?)");
    $hashPassword = passwordHash($password);
    $statement->execute(array($username,$Vorname, $Nachname, $e_mail,$hashPassword));

}

function deleteUsers(PDO $db, $username, $password){
    $stmt = $db->prepare('DELETE FROM user');
    $stmt->execute(array($username, $password));
}