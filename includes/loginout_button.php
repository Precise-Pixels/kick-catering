<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    echo '<a href="logout" id="login-btn" class="icon loggedout">LOGOUT</a>';
} else {
    echo '<a href="login" id="login-btn" class="icon loggedin">LOGIN / REGISTER</a>';
}