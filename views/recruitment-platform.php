<?php
    if($_SESSION['status'] != 'loggedin') {
        $_SESSION['status'] = 'notloggedin';
        header('location: login');
    }
?>

<section class="l-grey">
    <div class="section-padding align-centre">

        <h1>Recruitment Platform</h1>

    </div>
</section>