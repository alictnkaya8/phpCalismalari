<?php
require_once("baglan.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function acilirListeIcinKategorileriYaz($kategoriUstIdDegeri = 0, $boslukDegeri = 0){
            global $db;

            $kategoriSorgusu = $db->prepare("SELECT * FROM kategoriler WHERE ustid = ?");
            $kategoriSorgusu->execute([$kategoriUstIdDegeri]);
            $kategoriSayisi = $kategoriSorgusu->rowCount();
            $kategoriler = $kategoriSorgusu->fetchAll(PDO::FETCH_ASSOC);

            if($kategoriSayisi > 0){
                foreach($kategoriler as $kategori){
                    $kategoriId = $kategori["id"];
                    $kategoriUstId = $kategori["ustid"];
                    $kategoriAdi = $kategori["kategoriadi"];

                    echo "<option value='" . $kategoriId . "'>" . str_repeat("&nbsp;", $boslukDegeri) . $kategoriAdi . "</option>";
                    acilirListeIcinKategorileriYaz($kategoriId, $boslukDegeri+5);
                }
            }

        }
        function kategorileriYaz($kategoriUstIdDegeri = 0, $boslukDegeri = 0){
            global $db;

            $kategoriSorgusu = $db->prepare("SELECT * FROM kategoriler WHERE ustid = ?");
            $kategoriSorgusu->execute([$kategoriUstIdDegeri]);
            $kategoriSayisi = $kategoriSorgusu->rowCount();
            $kategoriler = $kategoriSorgusu->fetchAll(PDO::FETCH_ASSOC);

            if($kategoriSayisi > 0){
                foreach($kategoriler as $kategori){
                    $kategoriId = $kategori["id"];
                    $kategoriUstId = $kategori["ustid"];
                    $kategoriAdi = $kategori["kategoriadi"];

                    echo str_repeat("&nbsp;", $boslukDegeri) .  $kategoriAdi . " <a href='guncelle.php?id=" . 
                    $kategoriId . "'>[Güncelle]</a> <a href='sil.php?id=" . $kategoriId ."'>[Sil]</a><br>";
                    kategorileriYaz($kategoriId, $boslukDegeri+5);
                }
            }
        }
    ?>
    Menü Ekleme Formu <br>
    <form action="ekle.php" method="post">
        Üst Kategori: <select name="UstKategoriSecimi">
            <option value="0">Ana Menü</option>
            <?php acilirListeIcinKategorileriYaz(); ?>
        </select><br>
        Kategori Adı: <input type="text" name="kategoriAdi"><br>
        <input type="submit" value="Kategori Ekle">
    </form><br><br><br>

    <?php
        kategorileriYaz();

        $db = null;
    ?>
</body>
</html>