<html>

<?php
session_start();
require_once __DIR__ . '/functions.php';
$db = new PDO('mysql:host=localhost;  dbname=app', 'app', 'app');
if(!isset($_SESSION['username'])){
    header("Location: /index.php");
    die();
}

$id = $_GET['id'];
$user = searchId($db, $id);
?>
<form method="post">
    Username:<br>
    <input type="text" name="Username" value="<?php echo $user['0']['username']?>"/><br>
    Vorname:<br>
    <input type="text" name="Vorname"value="<?php echo $user['0']['Vorname']?>"/><br><br>
    Nachname:<br>
    <input type="text" name="Nachname" value="<?php echo $user['0']['Nachname']?>"/><br><br>
    E-mail:<br>
    <input type="email" name="e_mail"value="<?php echo $user['0']['e_mail']?>"/><br><br>
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
    deleteUsers($db,$id);
    header("Location: /management.php");
}
if (isset($_POST['edit'])
    && isset($_POST['Username'])
    && isset($_POST['Vorname'])
    && isset($_POST['Nachname'])
    && isset($_POST['e_mail'])) {
    changeUser($db,$id,$_POST['Username'], $_POST['Vorname'], $_POST['Nachname'], $_POST['e_mail']);
    header("Location: /management.php");

}
if (isset($_POST['abort'])) {
    header("Location: /management.php");
}
if(isset($_POST[logout])){
    session_destroy();
    header("Location: /index.php");
}
?>


</html>
