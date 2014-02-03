<section class="l-grey">
    <div class="section-padding align-centre">

        <h1>Resend Validation Email</h1>

        <?php
        require_once('php/LoginSystem.php');
        $login_system = new LoginSystem();

        if($_POST) {
            $email = $_POST['email'];

            if(!empty($email)) {
                $response = $login_system->resend_validation_email($email);
                echo $response;
            } else {
                echo '<p class="full error">Please enter your email.</p>';
            }
        }
        ?>

        <form method="post" novalidate>
            <table>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" name="email" required autofocus/></td>
                </tr>
            
                <tr>
                    <td></td>
                    <td><input type="submit" value="RESEND" class="btn"/></td>
                </tr>
            </table>
        </form>

    </div>
</section>