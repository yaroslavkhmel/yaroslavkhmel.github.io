<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

  // Replace contact@example.com with your real receiving email address
  //$receiving_email_address = 'yaroslavkhmel@hotmail.com';

  if ($_SERVER ['REQUEST_METHOD'] != 'POST') {header ('Location: yaroslavkhmel.online/'); exit();}
  
  
  
  /*
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  } 
  */

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$body = "From: $name\n E-Mail: $email\n Message:\n $message";

$mail = new PHPMailer(true);
$mail->isSMTPDebug =2; 
$mail->isSMTP(); 
$mail->Host = 'box.digital-helpdesk.com.';
$mail->SMTPAuth = true;
$mail->Username = 'robert@tradingsystemshub.com';
$mail->Password = 'tradingsystemspasswrd';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

/*
$mail->setFrom('robert@tradingsystemshub.com', 'TradingSystems');
$mail->addAttachment('attachment/product1.txt');
$mail->addAddress($cEmail, $name);
$mail->addReplyTo('robert@tradingsystemshub.com', 'TradingSystems');
$mail->isHTML(true);
$mail->Subject ="Your Purchase Details";
$mail->Body="Hi, <br><br>Thank you for purchasing Product1. In the attachment you will find my Amazing Product1.<br><br>Kind regards,<br>TradingSystemsHub.";
$mail->send();  
  
  $mail = new PHP_Email_Form(true);
  $mail->ajax = true; */
  
//  $mail->to = $receiving_email_address;
//  $mail->from_name = $_POST['name'];
//  $mail->from_email = $_POST['email']; 
//  $mail->Body = $_POST['email'] . $_POST['name'] . $_POST['message'];
//  $mail->Body .= $_POST['message'];
//  $bodyString =  nl2br("$_POST['email']\n\n\n\n$country\n\n\n\n$_POST['name']\n\n\n\n$_POST['message']");
  
  $mail->setFrom('robert@tradingsystemshub.com', 'SiteEmail');
  $mail->addAddress('yaroslavkhmel@hotmail.com', 'Site'); 
  $mail->addReplyTo($_POST['email'], $_POST['name']);
  $mail->Subject =  $_POST['subject'];
  $mail->Body = $body; 
  $mail->send();
?>
