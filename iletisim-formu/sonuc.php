<?php
header("Content-Type:text/html; charset=UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


function filtrele($deger){
    $islemBir = trim($deger);
    $islemIki = strip_tags($islemBir);
    $islemUc = htmlspecialchars($islemIki);
    return $islemUc;
}


$adSoyad = filtrele($_POST["adSoyad"]);
$telNo = filtrele($_POST["telNo"]);
$email = filtrele($_POST["email"]);
$konu = filtrele($_POST["konu"]);
$mesaj = filtrele($_POST["mesaj"]);




$mail = new PHPMailer(true);
    try {
    
        $mail->setLanguage('tr');
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alictnkaya8@gmail.com';
        $mail->Password = 'gvjiieoasajubvql';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->CharSet = 'UTF-8';
        
        $mail->setFrom($email, $adSoyad);
        $mail->addAddress('alictnkaya8@gmail.com', 'Ali Çetinkaya');
        $mail->addReplyTo($email, $adSoyad);

        // if(isset($_FILES['attachment']['name'])){
        //     $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        // }

        $mail->isHTML(true);
        $mail->Subject = $konu;
        $mail->msgHTML($mesaj);

        $mail->send();

        echo 'Mail gönderme işlemi başarıyla gerçekleşti.';


    } catch (Exception $e) {
        echo $e->errorMessage();
    }


?>