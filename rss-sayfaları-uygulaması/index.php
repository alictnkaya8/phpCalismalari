<?php
header("Content-Type: text/xmlns");
try{
    $db = new PDO("mysql:host=localhost;dbname=btkakademi", "root", "");
}catch(PDOException $error){
    echo $error->getMessage();
    die();
}

echo "
<?xml version='1.0' encoding='UTF-8'?>
<rss xmlns:xsi='http://w3.org/2001/XMLSchema-instance' xmlns:xsd='http://w3.org/2001/XMLSchema' version='2.0'>
    <channel>
        <title>Ürünler</title>
        <description>Ürün Listesi</description>
        <link>http://ekstraegitim.com</link>
        <language>tr</language>";

$query = $db->prepare("SELECT * FROM urunler");
$query->execute();
$sorguSayisi = $query->rowCount();
$urunler = $query->fetchAll(PDO::FETCH_ASSOC);

if($sorguSayisi > 0){
    foreach($urunler as $urun){
        echo "
        <item>
        <title>". $urun['urunadi'] ."</title>
        <price>". $urun['urunfiyati'] ."</price>
        </item>";
    }
}

echo "
    </channel>
</rss>";
?>