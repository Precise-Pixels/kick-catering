<?php

class MailClient {
    function send_msg($email, $subject, $msg) {
        $headers = 'From: pete@kickcatering.co.uk';
        mail($email, $subject, $msg, $headers);
    }
}