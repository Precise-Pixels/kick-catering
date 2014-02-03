<section class="l-grey">
    <div class="section-padding align-centre">

        <h1>Forgotten Your Password</h1>

        <form method="post">
            <table>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" name="email" required autofocus/></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="Reset"/></td>
                </tr>
            </table>
        </form>

    </div>
</section>

<?php
require_once('php/LoginSystem.php');
$login_system = new LoginSystem();

if($_POST) {
    $email = $_POST['email'];

    if(!empty($email)) {
        $exists = $login_system->check_user_exists($email);

        if($exists) {
            $response = $login_system->send_reset_password_link($email);
            echo $response;
        } else {
            echo 'No account with this email exists.';
        }
    } else {
        echo 'Please enter your email.';
    }
}
?>