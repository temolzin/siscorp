<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require_once '../process/enviarMail.php';

$sendEmail = new SendEmailController();
$action = $_POST['action'];

if($action == "sendemail") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];
    $mesagge = $_POST['message'];

   $arrayData = array(
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "message" => $mesagge
    );

    $sendEmail->sendemaiself($arrayData);
    $sendEmail->sendemailclient($arrayData);


}
