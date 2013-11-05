<?php

class RecruitmentPlatform {
    function employees_submit($name, $address_line_1, $address_line_2, $address_city, $address_county, $address_postcode, $address_country, $email, $telephone, $category, $location) {
        if($_FILES['cv']['error'] == 0) {
            $cv_name     = basename($_FILES['cv']['name']);
            $cv_ext      = substr($cv_name, strrpos($cv_name, '.') + 1);
            $cv_mime     = $_FILES['cv']['type'];
            $cv_size     = $_FILES['cv']['size'];
            $cv_tmp_name = $_FILES['cv']['tmp_name'];
            $cv_unique   = time() . '_' . $cv_name;
            $cv_dest     = dirname(__FILE__) . '/../uploads/' . $cv_unique;
            $cv_public   = 'http://kickcatering.co.uk/uploads/' . $cv_unique;
            $valid_ext   = array('doc', 'docx', 'pdf', 'txt', 'rtf', 'jpg', 'jpeg', 'png');
            $valid_mime  = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'application/x-pdf', 'application/acrobat', 'applications/vnd.pdf', 'text/pdf', 'text/x-pdf', 'text/plain', 'application/rtf', 'image/jpeg', 'image/png');

            if((in_array($cv_ext, $valid_ext)) && (in_array($cv_mime, $valid_mime)) && ($cv_size < 2097152)) {
                move_uploaded_file($_FILES['cv']['tmp_name'], $cv_dest);
                require_once('db.php');
                $user_id = $_SESSION['user_id'];

                $STH = $DBH->prepare("INSERT INTO employees (name, address_line_1, address_line_2, address_city, address_county, address_postcode, address_country, email, telephone, cv, category, location, user_id) value (:name, :address_line_1, :address_line_2, :address_city, :address_county, :address_postcode, :address_country, :email, :telephone, :cv_public, :category, :location, :user_id)");
                $STH->bindParam(':name', $name);
                $STH->bindParam(':address_line_1', $address_line_1);
                $STH->bindParam(':address_line_2', $address_line_2);
                $STH->bindParam(':address_city', $address_city);
                $STH->bindParam(':address_county', $address_county);
                $STH->bindParam(':address_postcode', $address_postcode);
                $STH->bindParam(':address_country', $address_country);
                $STH->bindParam(':email', $email);
                $STH->bindParam(':telephone', $telephone);
                $STH->bindParam(':cv_public', $cv_public);
                $STH->bindParam(':category', $category);
                $STH->bindParam(':location', $location);
                $STH->bindParam(':user_id', $user_id);
                $STH->execute();

                return 'Submitted successfully.';
            } else {
                echo 'Please ensure CV is one of the accepted file types and does not exceeds 2MB.';
            }
        } else {
            echo 'File upload error ' . $_FILES['cv']['error'] . '. Please try again or contact <a href="mailto:info@kickcatering.co.uk">info@kickcatering.co.uk</a>.';
        }
    }

    function employers_submit() {
        // do
        return 'Submitted successfully.';
    }
}