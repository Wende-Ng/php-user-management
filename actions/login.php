<html>

<?php
require_once __DIR__ . '/../src/functions.php';
session_start();
if (!isset($_SESSION['zaehler'])) {
    $_SESSION['zaehler'] = 3;
}
$zaehler = $_SESSION['zaehler'];

// Read username from CLI (if not given as script argument)
// Read password from CLI
// Test login
// If login successful write "Login succeeded"
// If not ask the user to input username/password again
// If not ask the user to input username/password again
$db = connect();

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<form action="login.php" method="post">
    Username:<br>
    <input type="text" name="Username" ><br>
    Password:<br>
    <input type="password" name="Userpswd" ><br><br>
    <input type="submit" name= "submit" value="submit"/>
</form>
<?php
require_once __DIR__ . '/../src/User.php';

if (isset($_POST['submit'])) {
    $name = $_POST['Username'];
    $password = $_POST['Userpswd'];
    if (User::findByUsername($db,$name) !== null) {
        $user = User::findByUsername($db,$name) ;
        if(password_verify($password, $user->getPassword())) {
            unset($_SESSION['zaehler']);
            $_SESSION['username'] = $name;
            header("Location: /user-management/actions/management.php");
        }
    }
    else{
        if ($zaehler <= 0) {
            echo "Too many attempts <br\>";
        }
        else{
            $zaehler--;
            $_SESSION['zaehler'] = $zaehler;
            echo "$zaehler attempts left <br \>";

        }
        echo "Wrong password or Username <br\>";
    }
}


?>
</html>