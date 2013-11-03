<h1>RESET PASSWORD</h1>

<form method="post" action="">
    <table>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="password" required autofocus/></td>
        </tr>
    
        <tr>
            <td></td>
            <td><input type="submit" value="Reset"/></td>
        </tr>
    </table>
</form>

<?php
require_once('php/LoginSystem.php');
$login_system = new LoginSystem();

if($_POST) {
    $email    = $_GET['e'];
    $rand     = $_GET['r'];
    $password = $_POST['password'];

    if(!empty($password)) {
        $response = $login_system->reset_password($email, $password, $rand);
        echo $response;
    } else {
        echo 'Please enter your new password.';
    }
}
?>