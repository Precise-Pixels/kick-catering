<section class="l-grey">
    <div class="section-padding align-centre">

        <?php
        $wrap_start = '<p class="full error">';
        $wrap_end   = '</p>';

        if(isset($_SESSION['status'])) {
            if($_SESSION['status'] == 'notloggedin') {
                echo $wrap_start . 'You must be logged in to view this page.' . $wrap_end;
                unset($_SESSION['status']);
            } elseif($_SESSION['status'] == 'loggedin') {
                echo $wrap_start . 'You are already logged in!' . $wrap_end;
            }
        }

        require_once('php/LoginSystem.php');
        $login_system = new LoginSystem();

        if(!empty($_POST['login-submit'])) {
            if(!empty($_POST['email']) && !empty($_POST['password'])) {
                $response = $login_system->login($_POST['email'], $_POST['password']);
                echo $response;
            } else {
                echo $wrap_start . 'Please enter your email and password.' . $wrap_end;
            }
        }

        if(!empty($_POST['register-submit'])) {
            $email          = $_POST['email'];
            $password       = $_POST['password'];
            $email_again    = $_POST['email_again'];
            $password_again = $_POST['password_again'];

            if(!empty($email) && !empty($password) && !empty($email_again) && !empty($password_again)) {
                if($email === $email_again && $password === $password_again) {
                    $exists = $login_system->check_user_exists($email);

                    if($exists) {
                        echo $wrap_start . 'An account with this email already exists.' . $wrap_end;
                    } else {
                        $response = $login_system->create_user($email, $password);
                        echo $response;
                    }
                } else {
                    echo $wrap_start . 'Email and/or password did not match. Please try again.' . $wrap_end;
                }
            } else {
                echo $wrap_start . 'Please enter your email and password.' . $wrap_end;
            }
        }
        ?>

        <p>Information about login / recruitment platform</p>

        <form method="post" id="login-form" class="half-margin active">
            <h1>Login</h1>
            <table>
                <tr><td><label for="email">Email:</label></td></tr>
                <tr><td><input type="email" name="email" required autofocus/></td></tr>

                <tr><td><label for="password">Password:</label></td></tr>
                <tr><td><input type="password" name="password" required/></td></tr>

                <tr><td><input type="submit" name="login-submit" value="LOGIN" class="btn"/></td></tr>
            </table>
            <p><a href="forgotten-password">Forgotten your password</a></p>
        </form>

        <form method="post" id="register-form" class="half-margin">
            <h1>Register</h1>
            <table>
                <tr><td><label for="email">Email:</label></td></tr>
                <tr><td><input type="email" name="email" required/></td></tr>

                <tr><td><label for="email_again">Retype email:</label></td></tr>
                <tr><td><input type="text" name="email_again" required/></td></tr>

                <tr><td><label for="password">Password:</label></td></tr>
                <tr><td><input type="password" name="password" required/></td></tr>

                <tr><td><label for="password_again">Retype password:</label></td></tr>
                <tr><td><input type="password" name="password_again" required/></td></tr>

                <tr><td><input type="submit" name="register-submit" value="REGISTER" class="btn"/></td></tr>
            </table>
        </form>

    </div>
</section>