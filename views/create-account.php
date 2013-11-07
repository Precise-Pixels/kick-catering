<h1>CREATE ACCOUNT</h1>

<form method="post">
    <table>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" required autofocus/></td>
        </tr>

        <tr>
            <td><label for="email_again">Retype email:</label></td>
            <td><input type="text" name="email_again" required/></td>
        </tr>

        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="password" required/></td>
        </tr>

        <tr>
            <td><label for="password_again">Retype password:</label></td>
            <td><input type="password" name="password_again" required/></td>
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
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $email_again    = $_POST['email_again'];
    $password_again = $_POST['password_again'];

    if(!empty($email) && !empty($password) && !empty($email_again) && !empty($password_again)) {
        if($email === $email_again && $password === $password_again) {
            $exists = $login_system->check_user_exists($email);

            if($exists) {
                echo 'An account with this email already exists.';
            } else {
                $response = $login_system->create_user($email, $password);
                echo $response;
            }
        } else {
            echo 'Email and/or password did not match. Please try again.';
        }
    } else {
        echo 'Please enter your email and password.';
    }
}
?>