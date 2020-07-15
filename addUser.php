<html>
<form method="post">
    Username:<br>
    <input type="text" name="Username"/><br>
    Password:<br>
    <input type="password" name="Userpswd"/><br><br>
    confirm Password:<br>
    <input type="password" name="Userpswd2"/><br><br>
    Vorname:<br>
    <input type="text" name="Vorname"/><br><br>
    Nachname:<br>
    <input type="text" name="Nachname"/><br><br>
    E-mail:<br>
    <input type="email" name="e_mail"/><br><br>
    <input type="submit" name="submit" value="submit"/>
</form>
<?php
require_once __DIR__ . '/functions.php';
session_start();
$db = new PDO('mysql:host=localhost;  dbname=app', 'app', 'app');
if(!isset($_SESSION['username'])){
    header("Location: /index.php");
    die();
}
if (isset($_POST['Username'])
    && isset($_POST['Userpswd'])
        && isset($_POST['Userpswd2'])
         && isset($_POST['Vorname'])
            && isset($_POST['Nachname'])
                && isset($_POST['e_mail'])
                    && isset($_POST['submit'])
                        && $_POST['Userpswd'] === $_POST['Userpswd2']){
                            addUser($db, $_POST['Username'], $_POST['Vorname'], $_POST['Nachname'], $_POST['e_mail'], $_POST['Userpswd']);
                            header("Location: /management.php");
                            }


?>


</html>