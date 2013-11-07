<?php

class LoginSystem {
    function login($email, $password) {
        require_once('db.php');
        require_once('php/Encryption.php');

        $encryption = new Encryption;
        $password_e = $encryption->encrypt($password);

        $STH = $DBH->query("SELECT id, password, valid FROM users WHERE email='$email'");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $row = $STH->fetch();

        if($row) {
            if($row->valid == 1) {
                if($row->password === $password_e) {
                    $_SESSION['status']     = 'loggedin';
                    $_SESSION['user_id']    = $row->id;
                    $_SESSION['user_email'] = $email;
                    (isset($_GET['r']) ? header("location:" . $_GET['r']) : header('location: recruitment-platform'));
                } else {
                    return 'Wrong email and/or password';
                }
            } else {
                return 'Please verify your account by clicking the verification link in your email before attempting to log in. If you have not receive a verification email, please check your spam/junk or <a href="resend-validation-email">request another verification email</a>.';
            }
        } else {
            return 'Wrong email and/or password';
        }
    }

    function logout() {
        unset($_SESSION['status']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        $referer = parse_url($_SERVER['HTTP_REFERER']);
        $referer_path = $referer['path'];
        header("location: $referer_path");
    }

    function create_user($email, $password) {
        require('db.php');
        require_once('php/Encryption.php');
        require_once('php/MailClient.php');

        $encryption = new Encryption;
        $password_e = $encryption->encrypt($password);

        $rand1 = $this->generate_random_number();
        $rand2 = $this->generate_random_number();

        $STH = $DBH->prepare("INSERT INTO users (email, password, valid, validate_rand, reset_rand) value (:email, :password, 0, $rand1, $rand2)");
        $STH->bindParam(':email', $email);
        $STH->bindParam(':password', $password_e);
        $STH->execute();

        $mail_client = new MailClient();
        $mail_client->send_msg($email, 'Verify your Kick Catering account', "Please follow this link to verify your Kick Catering account: http://kickcatering.co.uk/beta/verify-account?e=$email&r=$rand1");

        return 'Account successfully created. We have sent a verification link to your email. Please verify your account before attempting to log in. If you have not receive a verification email, please check your spam/junk or <a href="resend-validation-email">request another verification email</a>.';
    }

    function resend_validation_email($email) {
        require('db.php');
        require_once('php/MailClient.php');

        $rand = $this->generate_random_number();

        $STH = $DBH->prepare("UPDATE users SET validate_rand='$rand' WHERE email='$email'");
        $STH->execute();

        $mail_client = new MailClient();
        $mail_client->send_msg($email, 'Verify your Kick Catering account', "Please follow this link to verify your Kick Catering account: http://kickcatering.co.uk/beta/verify-account?e=$email&r=$rand");

        return 'We have sent a verification link to your email. Please verify your account before attempting to log in.';
    }

    function validate_user($email, $rand) {
        require('db.php');

        $STH = $DBH->query("SELECT validate_rand FROM users WHERE email='$email'");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $result = $STH->fetch();

        if($result->validate_rand == $rand) {
            $STH = $DBH->prepare("UPDATE users SET valid=1 WHERE email='$email'");
            $STH->execute();
            return true;
        } else {
            return false;
        }
    }

    function check_user_exists($email) {
        require('db.php');

        $STH = $DBH->query("SELECT email FROM users WHERE email='$email'");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $result = $STH->fetch();

        return (!$result ? false : true);
    }

    function send_reset_password_link($email) {
        require('db.php');
        require_once('php/MailClient.php');

        $rand = $this->generate_random_number();

        $STH = $DBH->prepare("UPDATE users SET reset_rand='$rand' WHERE email='$email'");
        $STH->execute();

        $mail_client = new MailClient();
        $mail_client->send_msg($email, 'Reset your Kick Catering account password', "Please follow this link to reset your Kick Catering account password: http://kickcatering.co.uk/beta/reset-password?e=$email&r=$rand");

        return 'We have sent instructions on how to reset your password to your email. Please check your emails.';
    }

    function reset_password($email, $password, $rand) {
        require('db.php');

        $STH = $DBH->query("SELECT reset_rand FROM users WHERE email='$email'");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $result = $STH->fetch();

        if($result->reset_rand == $rand) {
            require_once('php/Encryption.php');

            $encryption = new Encryption;
            $password_e = $encryption->encrypt($password);

            $new_rand = $this->generate_random_number();

            $STH = $DBH->prepare("UPDATE users SET password='$password_e', reset_rand='$new_rand' WHERE email='$email'");
            $STH->execute();

            return 'Password successfully reset. Please <a href="login">login</a>.';
        } else {
            return 'This link has expired. Please <a href="forgotten-password">request a new password reset link</a>.';
        }
    }

    function generate_random_number() {
        return rand(pow(10, 6-1), pow(10, 6)-1);
    }
}