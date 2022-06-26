<?php 
    
    if(isset($_POST['contact_submit'])){
        $first_name = htmlentities($_POST['first_name']);
        $last_name = htmlentities($_POST['last_name']);
        $email = htmlentities($_POST['email']);
        $subject = htmlentities($_POST['subject']);
        $message = htmlentities($_POST['message']);
        $server_response = '';

        if (empty($first_name) || empty($last_name) || empty($email) || empty($subject) || empty($message) ) {
            $server_response = "emptyField";
        } else if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name) || !preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
            $server_response = "invalidName";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $server_response = "invalidEmail";
        } else {
            $server_response = "success";
        }

        echo $server_response;
    }

?>