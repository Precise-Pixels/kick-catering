<h1>LOGIN</h1>

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
            <td><input type="submit" id="submit" value="Login" name="submit"/></td>
        </tr>
    </table>
</form>

<a href="create-account">Create a new account</a>
<a href="forgotten-password">Forgotten your password</a>

<?php
if(isset($_SESSION['status'])) {
    if($_SESSION['status'] == 'notloggedin') {
        echo 'You must be logged in to view this page.';
        unset($_SESSION['status']);
    } elseif($_SESSION['status'] == 'loggedin') {
        header('location: recruitment-platform');
    }
}

require_once('php/LoginSystem.php');
$login_system = new LoginSystem();

if($_POST) {
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $response = $login_system->login($_POST['email'], $_POST['password']);
        echo $response;
    } else {
        echo 'Please enter your email and password.';
    }
}
?>