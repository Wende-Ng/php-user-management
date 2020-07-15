<html>

<?php
require_once __DIR__ . '/functions.php';
session_start();
$db = new PDO('mysql:host=localhost;  dbname=app', 'app', 'app');
$statement = $db->query("SELECT * FROM user");
$user = $statement->fetchAll(PDO::FETCH_ASSOC);
if(!isset($_SESSION['username'])){
    header("Location: /index.php");
    die();
}
?>

<div >
    <div style="width: 100%; display: inline-block"  align="right">
    <p > Username: <?php echo $_SESSION['username']; ?> </p>
    <form  method="post">
        <input type="submit" name="logout" value="logout"/>
    </form>
    </div>
    <div style="width: 50%; display: inline-block" align="left">
    <?php
    foreach ($user as $value): ?>
        <a href="userEditor.php?id= <?php
        echo $value['id']; ?>">Edit</a>
        <?php
        echo $value['username'], "\n", $value['Vorname'], "\n", $value['Nachname'], "\n", $value['e_mail'], "<br \>"; ?>
    <?php
    endforeach; ?>
    <?php
    if(isset($_POST[logout])){
        session_destroy();
        header("Location: /index.php");
    }
    ?>
    </div>
    <form action= "addUser.php" method="post">
        <input type="submit" name="new" value="add user"/>
    </form>
</div>
</html>
