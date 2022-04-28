<?php
    require_once "baglan.php";
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
    <br><br><br><br>
    <form action="aramasonuc.php" method="post">
        <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><input type="text" name="kelime" style="width: 100%; height: 30px; margin-bottom: 20px; padding: 0 20px;"></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" value="Arama Yap" style="padding: 0 100px; height: 30px;"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="left"><?php
                    $gelenKelime = $_POST["kelime"];
                    $query = $db->prepare("SELECT * FROM esyalar WHERE adi LIKE '%$gelenKelime%'");
                    $query->execute();
                    $kayitSayisi = $query->rowCount();
                    $kayitlar = $query->fetchAll(PDO::FETCH_ASSOC);
                    echo "Bulunan Kayıtlar<br>";
                    foreach($kayitlar as $kayit){
                        echo $kayit["adi"] . "<br>";
                    }
                    
                ?></td>
            </tr>
        </table>
    </form>

    
</body>
</html>