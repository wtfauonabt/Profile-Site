<?php

/***********************************
Contact Modal
*************************************/
class ContactModal{

    /********************
    // Constructor
    *********************/
    public function __construct(){}

    /********************
    // PUBLIC FUNC
    *********************/
    public function send()
    {
        // Check for empty fields
        if(empty($_POST['name'])        ||
           empty($_POST['email'])       ||
           empty($_POST['phone'])       ||
           empty($_POST['message'])     ||
           empty($_POST['human'])     ||
           !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
           {
            echo "No arguments Provided!";
            return false;
           }

        $name = $_POST['name'];
        $email_address = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $human = $_POST['human'];

        // Create the email and send the message
        $to = 'contact@syeung527.com';
        $email_subject = "Website Contact Form:  $name";
        $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
        $headers = "From: noreply@syeung527.com\n";
        $headers .= "Reply-To: $email_address";
        mail($to,$email_subject,$email_body,$headers);
        return true;
    }

    public function validation()
    {
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        //Check if simple anti-bot test is correct
        if ($human !== 5) {
            $errHuman = 'Your anti-spam is incorrect';
        }
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        // If there are no errors, send the email
        if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
            if (mail ($to, $subject, $body, $from)) {
                $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
            } else {
                $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
            }
        }
    }
}




