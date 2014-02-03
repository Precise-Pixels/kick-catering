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

        <form method="post" class="half">
            <table>
                <tr><td><label for="email">Email:</label></td></tr>
                <tr><td><input type="email" name="email" required autofocus/></td></tr>

                <tr><td><input type="submit" value="RESEND" class="btn"/></td></tr>
            </table>
        </form>

        <p class="half">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, porro, ex maiores amet dolore cum vitae aut quos! Architecto, et illo vel facilis repellendus inventore labore explicabo assumenda exercitationem sit.</p>

    </div>
</section>