<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;  

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail ->SMTPSecure = 'tls';
$mail->Username = 'baraspinugayphase2@gmail.com';
$mail->Password = 'rlfdxmdeefkxgzdm';
$mail->Port = 587;
$mail->setFrom('baraspinugayphase2@gmail.com','Administrative Department');
$mail->isHTML(true);
$mail->Subject = 'Account Creation';
?>