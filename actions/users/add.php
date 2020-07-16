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
    <input type="submit" name="create" value="create"/>
</form>
<?php
require_once __DIR__ . '/../../src/functions.php';
require_once __DIR__ . '/../../src/User.php';
session_start();
$db = connect();
$user = new User();
if(!isset($_SESSION['username'])){
    header("Location: /user-management/index.php");
    die();
}
if (isset($_POST['Username'])
    && isset($_POST['Userpswd'])
        && isset($_POST['Userpswd2'])
         && isset($_POST['Vorname'])
            && isset($_POST['Nachname'])
                && isset($_POST['e_mail'])
                    && isset($_POST['create'])
                        && $_POST['Userpswd'] === $_POST['Userpswd2']){
                            $user->setUsername($_POST['Username']);
                            $user->setVorname($_POST['Vorname']);
                            $user->setNachname($_POST['Nachname']);
                            $user->setEMail($_POST['e_mail']);
                            $user->setPassword($_POST['Userpswd']);
                            $user->save($db);
                            header("Location: /user-management/actions/management.php");
                            }


?>


</html>