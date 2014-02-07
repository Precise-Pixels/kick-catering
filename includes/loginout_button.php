<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    echo '<a href="logout" id="login-btn" class="icon loggedout" title="Logout">LOGOUT</a>';
} else {
    echo '<a href="login" id="login-btn" class="icon loggedin" title="Login / Register">LOGIN / REGISTER</a>';
}