<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=btkakademi", "root", "");
} catch(PDOException $e){
    echo $e->getMessage();
    die();
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
    <?php
        $query = $db->prepare("SELECT * FROM bannerlar ORDER BY gosterimsayisi ASC LIMIT 1");
        $query->execute();
        $reklamKaydi = $query->fetch(PDO::FETCH_ASSOC);
    ?>

    <table width="1000" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr height="200">
            <td align="center"> <img src="dosyalar/<?= $reklamKaydi["bannerdosyasi"] ?>" border="0"></td>
        </tr>
    </table>
</body>
</html>
<?php
$reklamGuncelle = $db->prepare("UPDATE bannerlar SET gosterimsayisi = gosterimsayisi + 1 WHERE id = ? LIMIT 1");
$reklamGuncelle->execute([$reklamKaydi["id"]]);

$db = null;
?>