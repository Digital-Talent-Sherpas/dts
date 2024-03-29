<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'mail.digitaltalentsherpas99.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'no-reply@digitaltalentsherpas99.com';                 
    $mail->Password   = 'dts99NMRAM!';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 465;  
 
    $mail->setFrom('no-reply@digitaltalentsherpas99.com', 'Digital Talent Sherpas');           
    //$mail->addAddress('receiver1@gfg.com');
    $mail->addAddress('no-reply@digitaltalentsherpas99.com', 'Digital Talent Sherpas');
      
    $mail->isHTML(true);                                  
    $mail->Subject = 'Contact Info';
    $mail->Body    = '<html>This is a test email</html>';
    //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 
?>