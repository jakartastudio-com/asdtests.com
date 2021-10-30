<?php
  require 'inc/PHPMailerAutoload.php';
  
  $mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username = 'jay.dara@aliansoftware.net';                 // SMTP username
 $mail->Password = 'jaydara123';                           // SMTP password
  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 465;
  
?>