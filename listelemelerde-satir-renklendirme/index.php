<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=btkakademi", "root", "");
} catch(PDOException $error){
    echo $error->getMessage();
}

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
    <table width="1000" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr height="30" bgcolor="#000000">
            <td align="left" style="color: white;">&nbsp;Ürün Adı</td>
            <td align="right" style="color: white;">Ürün Fiyatı&nbsp;</td>
        </tr>
        <?php
            $query = $db->prepare("SELECT * FROM urunler");
            $query->execute();
            $urunler = $query->fetchAll(PDO::FETCH_ASSOC);

            $renkbir = "#dfdfdf";
            $renkiki = "ffffff";
            $counter = 0;

            foreach($urunler as $urun){
                if($counter%2){
                    $arkaPlanRengi = $renkbir;
                } else {
                    $arkaPlanRengi = $renkiki;
                }
            ?>
                <tr height="30" bgcolor="<?= $arkaPlanRengi; ?>" onmouseover="this.bgColor='#c2cedb';" onmouseout="this.bgColor='<?= $arkaPlanRengi ?>';" style="cursor: pointer;">
                    <td align="left">&nbsp;<?= $urun['urunadi'] ?></td>
                    <td align="right"><?= $urun['urunfiyati'] ?>&nbsp;</td>
                </tr>
            <?php
                $counter++;
            }
            ?>
    </table>
</body>
</html>