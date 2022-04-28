<?php
require_once("baglan.php");

$gelenId = filtrele($_GET["id"]);
$gelenUstKategoriSecimi = filtrele($_POST["UstKategoriSecimi"]);
$gelenkategoriAdi = filtrele($_POST["kategoriAdi"]);

if(isset($gelenId) and isset($gelenUstKategoriSecimi) and isset($gelenkategoriAdi)){
    $guncelle = $db->prepare("UPDATE kategoriler SET ustid = ?, kategoriadi = ? WHERE id = ? LIMIT 1");
    $guncelle->execute([$gelenUstKategoriSecimi, $gelenkategoriAdi, $gelenId]);
    $guncelleKontrolSayisi = $guncelle->rowCount();

    if($guncelleKontrolSayisi > 0){
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
    echo "Guncelleme sayfasına geri dönmek için <a href='guncelle.php?id=" . $gelenId . "'>tıklayınız</a>!";
}

$db = null;
?>