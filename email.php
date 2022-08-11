<?php
    if(!empty($_POST)) { 
        $errors = [];  
        $errorMessage = '';  

        //collect form data
        $name = htmlspecialchars($_POST['name']);
        $sender_email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        //validate
        if(empty($name)) {
            $errors[] = 'Please fill in your name';
        }

        if(empty($sender_email)) {
            $errors[] = "Please fill in your email address";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'The email address provided is invalid';
        }

        if(empty($message)) {
            $errors[] = 'Please fill in your message';
        }

        
        if (!empty($errors)) {  //where some errors were noted
            $allErrors = join('<br/>', $errors);
            $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
        }
        else {  //where there were no validation errors
            //set variables
            $email_subject = "Portfolio website message";
            $email_body = "New message from $name \n";
                        "Email address: $sender_email \n";
                        "Message: $message";
            $to = 'mutindajulie2@gmail.com';
            $headers = "From $sender_email \r\n";

            //send email & get response
            $sendemail = mail($to, $email_subject, $email_body, $headers);
            print_r($sendemail);

            if($sendemail) {
                echo 'Success: sent successfully!';
                //clear the form
                //unset($name, $sender_email, $message);
                //redirect
                //header('Location: thankyou.html');
                //exit();
            }
            else {
                echo 'Error: sent successfully!';
            }
        }

    }
?>