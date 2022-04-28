<?php

require_once "baglan.php";

$IPAdresi = $_SERVER["REMOTE_ADDR"];
$zamanDamgasi = time();
$oyKullanmaSiniri = 86400;
$zamaniGeriAl = $zamanDamgasi - $oyKullanmaSiniri;

$gelenCevap = $_POST["cevap"];

$query = $db->prepare("SELECT * FROM oykullananlar WHERE ipadresi = ? AND tarih >= ?");
$query->execute([
    $IPAdresi,
    $zamaniGeriAl
]);
$kontrolSayisi = $query->rowCount();

if($kontrolSayisi > 0){
    echo "HATA<br>";
    echo "Daha önce oy kullanmışsınız. Lütfen en az 24 saat sonra tekrar deneyiniz.<br>";
    echo "Anasayfaya dönmek için <a href='index.php'>tıklayınız.</a>";
} else {
    if($gelenCevap == 1){
        $guncelle = $db->prepare("UPDATE anket SET oysayisibir = oysayisibir + 1, toplamoysayisi = toplamoysayisi + 1");
        $guncelle->execute();
    } elseif($gelenCevap == 2){
        $guncelle = $db->prepare("UPDATE anket SET oysayisiiki = oysayisiiki + 1, toplamoysayisi = toplamoysayisi + 1");
        $guncelle->execute();
    } elseif($gelenCevap == 3){
        $guncelle = $db->prepare("UPDATE anket SET oysayisiuc = oysayisiuc + 1, toplamoysayisi = toplamoysayisi + 1");
        $guncelle->execute();
    } else {
        echo "HATA<br>";
        echo "Cevap kaydı bulunamıyor.<br>";
        echo "Anasayfaya dönmek için <a href='index.php'>tıklayınız.</a>";
    }

    $ekle = $db->prepare("INSERT INTO oykullananlar (ipadresi, tarih) VALUES (?, ?)");
    $ekle->execute([
        $IPAdresi,
        $zamanDamgasi
    ]);
    $ekleKontrol = $ekle->rowCount();

    if($ekleKontrol > 0){
        echo "Teşekkürler<br>";
        echo "Vermiş olduğunuz oy sisteme kaydedildi.<br>";
        echo "Anasayfaya dönmek için <a href='index.php'>tıklayınız.</a>";
    } else {
        echo "HATA<br>";
        echo "İşlem sırasında beklenmedik bir hata oluştu. Lütfen daha sonra tekrar deneyiniz.<br>";
        echo "Anasayfaya dönmek için <a href='index.php'>tıklayınız.</a>";
    }
}