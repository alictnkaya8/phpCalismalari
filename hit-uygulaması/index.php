<?php

require_once 'baglan.php';

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
        <tr height="30">
            <td colspan="2"></td>
        </tr>
        <tr height="30" bgcolor="#990000">
            <td align="left" style="color: white;">&nbsp;Makale Başlığı</td>
            <td align="right" style="color: white;">Görüntülenme Sayısı&nbsp;</td>
        </tr>

        <?php

            $query = $db->prepare("SELECT * FROM makaleler");
            $query->execute();
            $kayitSayisi = $query->rowCount();
            $kayitlar = $query->fetchAll(PDO::FETCH_ASSOC);

            if($kayitSayisi > 0){
                foreach($kayitlar as $kayit){
        ?>
                <tr height="30">
                    <td align="left"><a href="oku.php?id=<?= $kayit["id"] ?>" style="color: black; text-decoration: none;"> &nbsp;<?= $kayit["baslik"] ?></a></td>
                    <td align="right"><?= $kayit["goruntulenmesayisi"] ?>&nbsp;</td>
                </tr>
        <?php
                }
            }
        ?>
    </table>
</body>
</html>