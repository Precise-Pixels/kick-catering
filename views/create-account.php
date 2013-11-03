<h1>CREATE ACCOUNT</h1>

<form method="post" action="">
    <table>
        <tr>
            <td><label for="email">Email: </label></td>
            <td><input type="email" name="email" autofocus/></td>
        </tr>
    
        <tr>
            <td><label for="password">Password: </label></td>
            <td><input type="password" name="password"/></td>
        </tr>
    
        <tr>
            <td></td>
            <td><input type="submit" value="Create"/></td>
        </tr>
    </table>
</form>

<?php
require_once('php/LoginSystem.php');
$login_system = new LoginSystem();

if($_POST) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)) {
        $exists = $login_system->check_user_exists($email);

        if($exists) {
            echo 'An account with this email already exists.';
        } else {
            $response = $login_system->create_user($email, $password);
            echo $response;
        }
    } else {
        echo 'Please enter your email and password.';
    }
}
?>