<?php

class LoginSystem {
    function login($email, $password) {
        require_once('db.php');
        require_once('php/Encryption.php');

        $encryption = new Encryption;
        $password_e = $encryption->encrypt($password);

        $STH = $DBH->query("SELECT password, valid FROM users WHERE email='$email'");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $row = $STH->fetch();

        if($row) {
            if($row->valid == 1) {
                if($row->password === $password_e) {
                    $_SESSION['status'] = 'loggedin';
                    header('location: recruitment-platform');
                } else {
                    return 'Wrong email and/or password';
                }
            } else {
                return 'Please verify your account by clicking the link in your email before attemping to log in.';
            }
        } else {
            return 'Wrong email and/or password';
        }
    }

    function logout() {
        unset($_SESSION['status']);
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

        $rand = rand(pow(10, 6-1), pow(10, 6)-1);

        $STH = $DBH->prepare("INSERT INTO users (email, password, valid, rand) value (:email, :password, 0, $rand)");
        $STH->bindParam(':email', $email);
        $STH->bindParam(':password', $password_e);
        $STH->execute();

        $mail_client = new MailClient();
        $mail_client->send_msg($email, 'Verify your Kick Catering account', "Please follow this link to verify your Kick Catering account: http://kickcatering.co.uk/beta/verify-account?e=$email&r=$rand");

        return 'Account successfully created. We have sent a verification link to your email. Please verify your account before attempting to log in.';
    }

    function validate_user($email, $rand) {
        require('db.php');

        $STH = $DBH->query("SELECT rand FROM users WHERE email='$email'");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $result = $STH->fetch();

        if($result->rand == $rand) {
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
}