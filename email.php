<?php
    if($_POST["submit"]) {
        $recipient = "mutindajulie2@gmail.com";
        $subject = "Form to email message";
        $sender = $_POST['name'];
        $sender_email = $_POST['email'];
        $body = $_POST["message"];
        mail($recipient, $subject, "From: $sender <$senderEmail>");
        $thankYou="<p>Thank you! Your message has been sent.</p>";
    }    
?>