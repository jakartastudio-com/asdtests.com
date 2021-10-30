<?php

require 'inc/PHPMailerAutoload.php';
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$comment = $_REQUEST['customer_msg'];
/* start */
$mail = new PHPMailer;
$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.aliansoftware.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'donotreply@aliansoftware.com';                 // SMTP username
$mail->Password = 'LuhJM6k8n7';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;
/* end */

$to = $email;

$message = "<strong> First Name</strong>: $fname "
        . "<br/>"
        . "<br/><strong>Last Name</strong>: $lname"
        . "<br/> "
        . "<br/><strong>Email</strong>: $email"
        . "<br/>"
        . "<br/>";
$message .="<br/><strong>Message</strong>: <br/>"
        . "<br/>$comment";
$mail->isMail(); // Set mailer to use SMTP
$mail->setFrom("bansi.zalavadiya@aliansoftware.com", "ASD");
$mail->addAddress($to, 'ASD');
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->addReplyTo("donotreply@aliansoftware.com", $name);
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = "Contact Us - ASD";
$mail->Body = "$message";
$mail->AltBody = 'Thank you for contacting us.';

if (!$mail->send()) {
    //echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit();
} else {
   // echo 'Message has been sent';
    $autoemail = new PHPMailer();
    $autoemail->From = "bansi.zalavadiya@aliansoftware.com";
    $autoemail->FromName = "ASD";
    $autoemail->AddAddress($email, $mail->FromName);
    $autoemail->isHTML(true); 
    $autoemail->Subject = "Thank you - ASD";
   $auto_msg = "<strong> Hello $fname $lname,</strong>"
       
            . "<br/>"
            . "Thank you for contacting us."
           . "<br/>"
           ."We will contact you as soon as possible.";
    $autoemail->Body = "$auto_msg";

    $autoemail->Send();
    exit();
}
?>
 