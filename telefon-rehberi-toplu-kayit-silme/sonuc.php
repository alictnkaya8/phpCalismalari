<?php

require 'connect-db.php';

if(isset($_POST['submit'])){

    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $meslek = $_POST['meslek'];
    $telefon = $_POST['telefon'];

    if(!$ad){
        echo 'Lütfen adınızı girin!';
    } elseif (!$soyad) {
        echo 'Lütfen soyadınızı girin!';
    } elseif (!$meslek) {
        echo 'Lütfen mesleğinizi girin!';
    } elseif (!$telefon) {
        echo 'Lütfen telefon numaranızı girin!';
    } else {
            
        $query = $db->prepare('INSERT INTO kisiler SET ad = :ad, soyad = :soyad, meslek = :meslek, telefon = :telefon');
        $ekle = $query->execute([
            'ad' => $ad, 
            'soyad' => $soyad, 
            'meslek' => $meslek,
            'telefon' => $telefon
        ]);
            
        if($ekle){
            header('Location:index.php');
        } else {
            echo 'Bir sorun oluştu!';
        }
    }
    if(isset($_POST['sil'])){

        $silinecekler = $_POST['sil'];
    
        foreach($silinecekler as $silinecek){
            $query = $db->prepare('DELETE FROM kisiler WHERE id = :id');
            $query->execute([
            'id' => $silinecek
            ]);
        }
        header('Location:index.php');
    }
}

?>