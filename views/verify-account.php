<h1>VERIFY ACCOUNT</h1>

<?php
require_once('php/LoginSystem.php');
$login_system = new LoginSystem();

$response = $login_system->validate_user($_GET['e'], $_GET['r']);

echo ($response ? 'User verified. Please <a href="login">login</a>.' : 'An error has occurred verifying your account. Please contact <a href="mailto:info@kickcatering.co.uk">info@kickcatering.co.uk</a>');
?>