<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$email = isset($_POST['email']) ? $_POST['email'] : null;
$subject = isset($_POST['subject']) ? $_POST['subject'] : 'E-posta Konusu';
$content = isset($_POST['content']) ? $_POST['content'] : null;

if(!$email){
    echo 'E-posta adresini girin.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo 'Lütfen geçerli bir e-posta adresi yazın.';
} elseif(!$content){
    echo 'Lütfen e-posta içeriğini yazın.';
} else {

    $mail = new PHPMailer(true);
    try {
    
        $mail->setLanguage('tr');
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alictnkaya8@gmail.com';
        $mail->Password = 'ejovwktxqqvpmtnk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->CharSet = 'UTF-8';
        
        // maili gönderen kişi
        $mail->setFrom('alictnkaya8@gmail.com', 'Ali Çetinkaya');
        $mail->addAddress($email);
        $mail->addReplyTo('alictnkaya8@gmail.com', 'Ali Çetinkaya');

        if(isset($_FILES['attachment']['name'])){
            $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();

        echo 'Mail gönderme işlemi başarıyla gerçekleşti.';


    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}

