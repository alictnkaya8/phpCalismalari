<?php
require_once("baglan.php");

$gelenUstKategoriSecimi = filtrele($_POST["UstKategoriSecimi"]);
$gelenkategoriAdi = filtrele($_POST["kategoriAdi"]);

if(isset($gelenUstKategoriSecimi) and isset($gelenkategoriAdi)){
    $ekle = $db->prepare("INSERT INTO kategoriler (ustid, kategoriadi) VALUES (?, ?)");
    $ekle->execute([$gelenUstKategoriSecimi, $gelenkategoriAdi]);
    $ekleKontrolSayisi = $ekle->rowCount();

    if($ekleKontrolSayisi > 0){
        header("Location:index.php");
        exit();
    } else {
        echo "HATA!<br>";
        echo "İşlem sırasında beklenmedik bir sorun oluştu!<br>";
        echo "Ana sayfaya geri dönmek için <a href='index.php'>tıklayınız</a>!";
    }

} else {
    echo "HATA!<br>";
    echo "Lütfen bu alanı boş bırakmayınız!<br>";
    echo "Ana sayfaya geri dönmek için <a href='index.php'>tıklayınız</a>!";
}

$db = null;
?>