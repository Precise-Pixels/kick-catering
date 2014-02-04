<section class="l-grey">
    <div class="section-padding align-centre">

        <h1>Verify Account</h1>

        <?php
        if(!isset($_GET['e']) || !isset($_GET['r'])) {
            header('location: /');
        }

        require_once('php/LoginSystem.php');
        $login_system = new LoginSystem();

        $response = $login_system->validate_user($_GET['e'], $_GET['r']);

        echo '<p class="full error">' . ($response ? 'User account verified. You may now <a href="login">log in</a>.' : 'An error has occurred whilst verifying your account. Please contact <a href="mailto:info@kickcatering.co.uk">info@kickcatering.co.uk</a>.') . '</p>';
        ?>

    </div>
</section>