<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    echo '<a href="logout"><div id="login-btn" class="btn">LOGOUT</div></a>';
} else {
    echo '<a href="login"><div id="login-btn" class="btn">LOGIN / REGISTER</div></a>';
}