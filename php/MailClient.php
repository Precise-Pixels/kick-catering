<?php

class MailClient {
    function send_msg($email, $subject, $msg) {
        $headers = 'From: info@kickcatering.co.uk';
        mail($email, $subject, $msg, $headers);
    }
}