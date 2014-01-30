<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    echo '<a href="logout"><button>Logout</button></a>';
} else {
    echo '<a href="login?r=' . ltrim($_SERVER['REQUEST_URI'], '/') . '"><button id="login-btn">Login</button></a>';
}