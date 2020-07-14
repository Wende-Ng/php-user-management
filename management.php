<html>

<?php
require_once __DIR__ . '/functions.php';
session_start();
$db = new PDO('mysql:host=localhost;  dbname=app', 'app', 'app');
$statement = $db->query("SELECT * FROM user");
$user = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($user as $value){
    $username = $value['username'];
    $Vorname = $value['Vorname'];
    $Nachname = $value['Nachname'];
    $e_mail = $value['e_mail'];
    $id = $value['id'];
    echo "$username ";
    echo "$Vorname ";
    echo "$Nachname ";
    echo "$e_mail ";
    echo "$id <br \>";
}
?>


</html>
