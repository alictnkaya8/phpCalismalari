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

    <?php
        $query = $db->prepare("SELECT * FROM anket LIMIT 1");
        $query->execute();
        $kayitSayisi = $query->rowCount();
        $kayit = $query->fetch(PDO::FETCH_ASSOC);

        $birinciSecenekIcinYuzde = number_format((($kayit["oysayisibir"]/$kayit["toplamoysayisi"]) * 100), 2, ",", "");
        $ikinciSecenekIcinYuzde = number_format((($kayit["oysayisiiki"]/$kayit["toplamoysayisi"]) * 100), 2, ",", "");
        $ucuncuSecenekIcinYuzde = number_format((($kayit["oysayisiuc"]/$kayit["toplamoysayisi"]) * 100), 2, ",", "");

        if($kayitSayisi > 0){
    ?>
    <table width="300" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr height="30">
            <td colspan="2"><?= $kayit['soru'] ?></td>
        </tr>
        <tr height="30">
            <td width="75">%<?= $birinciSecenekIcinYuzde; ?></td>
            <td width="225"><?= $kayit['cevapbir'] ?></td>
        </tr>
        <tr height="30">
            <td width="75">%<?= $ikinciSecenekIcinYuzde; ?></td>
            <td width="225"><?= $kayit['cevapiki'] ?></td>
        </tr>
        <tr height="30">
            <td width="75">%<?= $ucuncuSecenekIcinYuzde; ?></td>
            <td width="225"><?= $kayit['cevapuc'] ?></td>
        </tr>
        <tr height="30">
            <td colspan="2" align="right"><a href="index.php" style="text-decoration: none;">Ana Sayfaya Dön</a></td>
        </tr>
    </table>
    <?php 
    } else {
        header("Location:index.php");
        exit;
    }
    ?>
</body>
</html>