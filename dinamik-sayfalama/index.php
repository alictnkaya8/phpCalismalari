<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=btkakademi;charset=UTF8", "root", "");
}catch(PDOException $error){
    echo $error->getMessage();
    die();
}

if(isset($_REQUEST['sayfalama'])){
    $gelenSayfa = $_REQUEST['sayfalama'];
} else {
    $gelenSayfa = 1;
}

$sayfalamaIcinSolveSagButonSayisi = 2;
$sayfaBasinaGosterilecekKayitSayisi = 5;
$toplamKayit = $db->prepare("SELECT * FROM products");
$toplamKayit->execute();
$toplamKayit = $toplamKayit->rowCount();
$sayfalamayaBaslanacakKayitSayisi = ($gelenSayfa * $sayfaBasinaGosterilecekKayitSayisi) - $sayfaBasinaGosterilecekKayitSayisi;
$toplamSayfaSayisi = ceil($toplamKayit / $sayfaBasinaGosterilecekKayitSayisi);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .SayfalamaAlaniKapsayicisi{
            display: block;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 10px 0px 10px 0px;
            border: 0;
            outline: 0;
            text-align: center;
            text-decoration: none;
        }
        .SayfalamaAlaniIcinMetinAlanıKapsayicisi{
            display: block;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 5px 0px 5px 0px;
            border: 0;
            outline: 0;
            text-align: center;
            text-decoration: none;
        }
        .SayfalamaAlaniIcinNumaralandırmaAlanıKapsayicisi{
            display: block;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 5px 0px 5px 0px;
            border: 0;
            outline: 0;
            text-align: center;
            text-decoration: none;
        }
        .Pasif{
            display: inline-block;
            width: auto;
            height: 20px;
            margin: 0px 0.5px;
            padding: 0;
            padding: 5px 7.5px;
            background: #FFFFFF;
            border: 0;
            border: 1px solid #DADADA;
            outline: 0;
            color: #646464;
            font-size: 14px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            line-height: 20px;
            text-align: center;
            text-decoration: none;
        }
        .Pasif a:link, a:visited, a:hover, a:active{
            text-decoration: none;
            color: #646464;
        }
        .Aktif{
            display: inline-block;
            width: auto;
            height: 20px;
            margin: 0px 0.5px;
            padding: 0;
            padding: 5px 7.5px;
            background: #F6F6F6;
            border: 0;
            border: 1px solid #DADADA;
            outline: 0;
            color: #FF0000 ;
            font-size: 14px;
            font-style: normal;
            font-variant: normal;
            font-weight: bold;
            line-height: 20px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <?php
            $query = $db->prepare("SELECT * FROM products ORDER BY id ASC LIMIT $sayfalamayaBaslanacakKayitSayisi, $sayfaBasinaGosterilecekKayitSayisi");
            $query->execute();
            $kayitSayisi = $query->rowCount();
            $urunler = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach($urunler as $urun):
        ?>
                <tr height="30">
                    <td width="25" align="left"><?= $urun["id"] ?></td>
                    <td width="375" align="left"><?= $urun["urunadi"] ?></td>
                    <td width="100" align="right"><?= $urun["urunfiyati"] . " " . $urun["parabirimi"] ?></td>
                </tr>
        <?php endforeach; ?>
    </table>
    <div class="SayfalamaAlaniKapsayicisi">
        <div class="SayfalamaAlaniIcinMetinAlanıKapsayicisi">
                Toplam <?= $toplamSayfaSayisi ?> sayfada, <?= $toplamKayit ?> adet kayıt bulunmaktadır.
        </div>

        <div class="SayfalamaAlaniIcinNumaralandırmaAlanıKapsayicisi">
            <?php
                if($gelenSayfa > 1){
                    echo "<span class='Pasif'><a href='index.php?sayfalama=1'><<</a></span>";
                    $sayfaDegeriniBirGeriAl = $gelenSayfa - 1;
                    echo "<span class='Pasif'><a href='index.php?sayfalama=". $sayfaDegeriniBirGeriAl . "'> <</a></span>";
                }

                for($sayfaIndexDegeri = $gelenSayfa - $sayfalamaIcinSolveSagButonSayisi; $sayfaIndexDegeri <= $gelenSayfa + $sayfalamaIcinSolveSagButonSayisi; $sayfaIndexDegeri++){
                    if(($sayfaIndexDegeri > 0) && ($sayfaIndexDegeri <= $toplamSayfaSayisi)){
                        if ($gelenSayfa == $sayfaIndexDegeri) {
                            echo "<span class='Aktif'>" . $sayfaIndexDegeri . " </span>";
                        } else {
                            echo "<span class='Pasif'><a href='index.php?sayfalama=" . $sayfaIndexDegeri . "'> " . $sayfaIndexDegeri . " </a></span>";
                        }
                        
                        
                    }
                    
                    
                }

                if($gelenSayfa != $toplamSayfaSayisi){
                    $sayfaDegeriniBirIleriAl = $gelenSayfa + 1;
                    echo "<span class='Pasif'><a href='index.php?sayfalama=". $sayfaDegeriniBirIleriAl . "'> ></a></span>";
                    echo "<span class='Pasif'><a href='index.php?sayfalama=" . $toplamSayfaSayisi . "'> >></a></span>";
                }
            ?>
        </div>
    </div>
</body>
</html>