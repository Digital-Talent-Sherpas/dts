<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$errors = [];
$errorMessage = ' ';
$successMessage = ' ';
echo "sending ...";
if (!empty($_POST)) {
    $fname = $_POST["first-name"];
    $lname = $_POST["last-name"];
    $company = $_POST["company"];
    $title = $_POST["title"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    if (empty($fname)) {
        $errors[] = "First name is empty";
    }
    
    if (empty($lname)) {
        $errors[] = "last name is empty";
    }
    
    if (empty($email)) {
        $errors[] = "Email is empty";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is invalid";
    }
    
    if (!empty($errors)) {
         $allErrors = join ("<br/>", $errors);
         $errorMessage = "<p style='color: red; '>{$allErrors}</p>";
    } else {
        $fromEmail = "no-reply@digitaltalentsherpas99.com";
        $fromName = "Digital Talent Sherpas";
        $emailSubject = "DTS Registration Contact Information";
        $toEmail = "no-reply@digitaltalentsherpas99.com";
        $toName = "Digital Talent Sherpas";

        // Create a new PHPMailer instance
        $mail = new PHPMailer(exceptions: true);
        try {
            // Configure the PHPMailer instance
            //Enable SMTP debugging
            $mail->SMTPDebug = 3;
            //Set PHPMailer to use SMTP
            $mail->isSMTP();
            //Set SMTP host name
            $mail->Host = "mail.digitaltalentsherpas99.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password
            $mail->Username = "no-reply@digitaltalentsherpas99.com";
            $mail->Password = "DTS99nmr4m!";
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";
            //Needed to connect to port 465
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            //Set TCP port to connect to
            $mail->Port = 465;
            //$mail->Port = 587;
           
            // Set the sender, recipient, subject, and body of the message 
            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($toEmail, $toName);
            $mail->Subject = $emailSubject;
            
            $mail->isHTML(true);
            $mail->Body = "<p>Name: {$fname} {$lname}</p><p>Company: {$company}</p><p>Title: {$title}</p><p>Phone: {$phone}</p><p>Email: {$email}</p>";
         
            // Send the message
            $mail->send () ;
            $successMessage = "<p style='color: green; '>Thank you for contacting us :)</p>";
        } catch (Exception $e) {
            $errorMessage = "<p style='color: red; '>Something went wrong. Please try again later</p>";
            echo $errorMessage;
        }
    }
}

?>