<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    echo '<a href="logout"><div class="btn">LOGOUT</div></a>';
} else {
    echo '<a href="login?r=' . ltrim($_SERVER['REQUEST_URI'], '/') . '"><div id="login-btn" class="btn">LOGIN / REGISTER</div></a>';
}