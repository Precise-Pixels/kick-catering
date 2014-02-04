<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    echo '<a href="logout" id="login-btn" class="btn">LOGOUT</a>';
} else {
    echo '<a href="login" id="login-btn" class="btn">LOGIN / REGISTER</a>';
}