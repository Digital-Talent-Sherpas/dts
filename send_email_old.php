<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$mail = new PHPMailer(true);

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

$mail->setFrom("no-reply@digitaltalentsherpas99.com", "Digital Talent Sherpas");
$mail->addAddress("ryan@digitaltalentsherpas99.com", "Digital Talent Sherpas");

$mail->isHTML(true);
$mail->Subject = "Contact Info";
$mail->Body = "<html>This is a test email</html>";
//$mail->AltBody = "Body in plain text for non-HTML mail clients";

if (!$mail->send()) {
    echo "Mail Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent successfully";
}

?>
