<section class="l-grey">
    <div class="section-padding align-centre">

        <h1>Forgotten Your Password</h1>

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
                    echo '<p class="full error">No account with this email exists.</p>';
                }
            } else {
                echo '<p class="full error">Please enter your email.</p>';
            }
        }
        ?>

        <div class="fraction-wrapper">
            <form method="post" class="half-margin">
                <table>
                    <tr><td><label for="email">Email:</label></td></tr>
                    <tr><td><input type="email" name="email" required autofocus/></td></tr>

                    <tr><td><input type="submit" value="RESET" class="btn"/></td></tr>
                </table>
            </form>
        </div>

        <div class="fraction-wrapper">
            <p class="half-margin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, porro, ex maiores amet dolore cum vitae aut quos! Architecto, et illo vel facilis repellendus inventore labore explicabo assumenda exercitationem sit.</p>
        </div>

    </div>
</section>