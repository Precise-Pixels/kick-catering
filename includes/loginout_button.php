<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    echo '<a href="logout"><button>Logout</button></a>';
} else {
    echo '<a href="login"><button>Login</button></a>';
}