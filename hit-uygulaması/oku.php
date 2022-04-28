<?php
require_once 'baglan.php';
$gelenID = filtrele($_GET["id"]);

$gosterimGuncelle = $db->prepare("UPDATE makaleler SET goruntulenmesayisi = goruntulenmesayisi + 1 WHERE id = ?");
$gosterimGuncelle->execute([$gelenID]);
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
    <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr height="30">
            <td align="left"><b>Görüntüleme ve Hit Uygulaması</b></td>
            <td align="right"><a href="index.php" style="text-decoration: none; color: black;">Anasayfa</a></td>
        </tr>
    <?php
        $query = $db->prepare("SELECT * FROM makaleler WHERE id = ?");
        $query->execute([$gelenID]);
        $kayitSayisi = $query->rowCount();
        $kayit = $query->fetch(PDO::FETCH_ASSOC);

        if($kayitSayisi > 0){
    ?>            
            <tr height="30">
                <td align="left" colspan="2"><h3><?=$kayit["baslik"]?></h3></td>
            </tr>
            <tr height="30">
                <td align="left" colspan="2"><?=$kayit["icerik"]?></td>
            </tr>
            <tr height="30">
                <td align="center" colspan="2">Bu makale <?=$kayit["goruntulenmesayisi"]?> defa görüntülendi.</td>
            </tr>
    <?php
        } else {
            header("Location:index.php");
        }
    ?>
    </table>
</body>
</html>