<?php
require_once("baglan.php");

$gelenId = filtrele($_GET["id"]);


$kategoriHiyerarsisiniBulDizisi = [$gelenId];
function kategoriHiyerarsisiniBul($kategoriIdDegeri){
    global $db;
    global $kategoriHiyerarsisiniBulDizisi;

    $kategoriSorgusu = $db->prepare("SELECT * FROM kategoriler WHERE ustid = ?");
    $kategoriSorgusu->execute([$kategoriIdDegeri]);
    $kategoriSayisi = $kategoriSorgusu->rowCount();
    $kategoriler = $kategoriSorgusu->fetchAll(PDO::FETCH_ASSOC);

    if($kategoriSayisi > 0){
        foreach($kategoriler as $kategori){
            $kategoriId = $kategori["id"];
            $kategoriHiyerarsisiniBulDizisi[] = $kategoriId;
            kategoriHiyerarsisiniBul($kategoriId);
        }
    }
    return $kategoriHiyerarsisiniBulDizisi;
}

if(isset($gelenId)){
    $silinecekKategoriler = kategoriHiyerarsisiniBul($gelenId);

    foreach($silinecekKategoriler as $silinecekKategori){
        $sil = $db->prepare("DELETE FROM kategoriler WHERE id = ? LIMIT 1");
        $sil->execute([$silinecekKategori]);
        $silKontrolSayisi = $sil->rowCount();
        if($silKontrolSayisi < 1){
            echo "HATA!<br>";
            echo "İşlem sırasında beklenmedik bir sorun oluştu!<br>";
            echo "Ana sayfaya geri dönmek için <a href='index.php'>tıklayınız</a>!";
        }
    }
    header("Location:index.php");
    exit(); 
} else {
    echo "HATA!<br>";
    echo "Ana sayfaya geri dönmek için <a href='index.php'>tıklayınız</a>!";
}

$db = null;
?>