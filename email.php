<?php
//page cannot be accessed directly
    if(!isset($_POST['submit'])) {
        echo 'Error: You need to submit the form';
    }
    //collect the data
    else {
        $name = $_POST['name'];
        $sender_email = $_POST['email'];
        $message = $_POST['message'];
        //validate - invalid fields
        if(empty($name)||empty($sender_email)) {
            echo "Please fill in your name and email address";
            exit;
        }

        /* //validate - injected input
        if(IsInjected($visitor_email)) {
        echo "Bad email value!";
        exit;
        } */

        //set variables
        $recipient = "mutindajulie2@gmail.com";
        $email_subject = "Portfolio website message";
        $email_body = "New message from $name \n";
                    "Email address: $sender_email \n";
                    "Message: $message";
        $to = 'mutindajulie2@gmail.com';
        $headers = "From $sender_email \r\n";
        //send email
        mail($to, $email_subject, $email_body, $headers);
        //mail sent response
        if(mail($to, $email_subject, $email_body, $headers)){
            echo "Message sent successfully";
        }
        else {
            echo "Not sent";
        }
        //send success message for user
        header('Location: thank-you.html');
        
        /* //validate - injected input
        function IsInjected($str) {
            $injections = array('(\n+)',
                        '(\r+)',
                        '(\t+)',
                        '(%0A+)',
                        '(%0D+)',
                        '(%08+)',
                        '(%09+)'
                        );
            $inject = join('|', $injections);
            $inject = "/$inject/i";
            if(preg_match($inject,$str)) {
                return true;
            }
            else {
                return false;
            }
            }
    */

    }
?>