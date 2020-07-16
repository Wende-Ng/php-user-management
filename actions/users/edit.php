<html>

<?php
session_start();
require_once __DIR__ . '/../../src/functions.php';
require_once __DIR__ . '/../../src/User.php';
if(!isset($_SESSION['username'])){
    header("Location: /user-management/index.php");
    die();
}
$db = connect();
$id = $_GET['id'];
$user = User::findById($db, $id);

?>
<form method="post">
    Username:<br>
    <input type="text" name="Username" value="<?php echo $user->getUsername();?>"/><br>
    Vorname:<br>
    <input type="text" name="Vorname"value="<?php echo $user->getVorname();?>"/><br><br>
    Nachname:<br>
    <input type="text" name="Nachname" value="<?php echo $user->getNachname();?>"/><br><br>
    E-mail:<br>
    <input type="email" name="e_mail"value="<?php echo $user->getEMail();?>"/><br><br>
    <input type="submit" name="edit" value="save"/>
</form>
<p align="right"> Username: <?php echo $_SESSION['username']; ?> </p>
<form method="post">
    <input type="submit" name="delete" value="delete"/>
    <input type="submit" name="abort" value="abort"/>
    <div align="right"><input type="submit" name="logout" value="logout"/> </div>
</form>
<?php
if (isset($_POST['delete'])) {
    $user->delete($db);
    header("Location: /user-management/actions/management.php");
}
if (isset($_POST['edit'])
    && isset($_POST['Username'])
    && isset($_POST['Vorname'])
    && isset($_POST['Nachname'])
    && isset($_POST['e_mail'])) {
    $user->setUsername($_POST['Username']);
    $user->setVorname($_POST['Vorname']);
    $user->setNachname($_POST['Nachname']);
    $user->setEMail($_POST['e_mail']);
    $user->save($db);
    header("Location: /user-management/actions/management.php");

}
if (isset($_POST['abort'])) {
    header("Location: /user-management/actions/management.php");
}
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: /user-management/index.php");
}
?>


</html>
