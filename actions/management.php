<html>

<?php
require_once __DIR__ . '/../src/functions.php';
require_once __DIR__ . '/../src/User.php';
session_start();
$db = connect();
$statement = $db->query("SELECT * FROM user");
$user = $statement->fetchAll(PDO::FETCH_ASSOC);
if(!isset($_SESSION['username'])){
    header("Location: /user-management/index.php");
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
        <a  href="users/edit.php?id=<?php
        echo escape($value['id']);?>">Edit</a>
        <?php
        echo $value['username'], "\n", $value['Vorname'], "\n", $value['Nachname'], "\n", $value['e_mail'], "<br \>"; ?>
    <?php
    endforeach; ?>
    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: /user-management/index.php");
    }
    ?>
    </div>
    <form action= "users/add.php" method="post">
        <input type="submit" name="new" value="add user"/>
    </form>
</div>
</html>
