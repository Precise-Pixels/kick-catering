<h1>RESEND VALIDATION EMAIL</h1>

<form method="post" action="">
    <table>
        <tr>
            <td><label for="email">Email: </label></td>
            <td><input type="email" name="email" required autofocus/></td>
        </tr>
    
        <tr>
            <td></td>
            <td><input type="submit" value="Resend"/></td>
        </tr>
    </table>
</form>

<?php
require_once('php/LoginSystem.php');
$login_system = new LoginSystem();

if($_POST) {
    $email = $_POST['email'];

    if(!empty($email)) {
        $response = $login_system->resend_validation_email($email);
        echo $response;
    } else {
        echo 'Please enter your email.';
    }
}
?>