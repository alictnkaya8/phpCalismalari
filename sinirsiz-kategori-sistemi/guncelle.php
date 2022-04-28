<?php
require_once("baglan.php");

$gelenId = filtrele($_GET["id"]);
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

function acilirListeIcinKategorileriYaz($guncellenecekId, $guncellenecekUstId, $kategoriUstIdDegeri = 0, $boslukDegeri = 0){
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

            if($guncellenecekId != $kategoriId){
                if($guncellenecekUstId == $kategoriId){
                    echo "<option value='" . $kategoriId . "' selected='selected'>" . str_repeat("&nbsp;", $boslukDegeri) . $kategoriAdi . "</option>";
                } else {
                    echo "<option value='" . $kategoriId . "'>" . str_repeat("&nbsp;", $boslukDegeri) . $kategoriAdi . "</option>";
                }
                acilirListeIcinKategorileriYaz($guncellenecekId, $guncellenecekUstId, $kategoriId, $boslukDegeri+5);
            }
        }
    }
}

$query = $db->prepare("SELECT * FROM kategoriler WHERE id = ? LIMIT 1");
$query->execute([$gelenId]);
$sorguSayisi = $query->rowCount();
$sorguKaydi = $query->fetch(PDO::FETCH_ASSOC);

print_r($sorguKaydi);

?>
    Menü Güncelleme Formu <br>
    <form action="guncellesonuc.php?id=<?= $sorguKaydi['id'] ?>" method="post">
        Üst Kategori: <select name="UstKategoriSecimi">
            <option value="0" <?php if($sorguKaydi['ustid']):?> selected="selected"<?php endif;?>>Ana Menü</option>
            <?php acilirListeIcinKategorileriYaz($sorguKaydi['id'], $sorguKaydi['ustid']); ?>
        </select><br>
        Kategori Adı: <input type="text" name="kategoriAdi" value="<?= $sorguKaydi['kategoriadi'] ?>"><br>
        <input type="submit" value="Kategoriyi Güncelle">
    </form><br><br><br>

<?php
    $db = null;
?>
</body>
</html>