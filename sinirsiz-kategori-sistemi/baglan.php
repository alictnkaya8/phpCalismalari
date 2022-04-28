<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=btkakademi;charset=UTF8", "root", "");
} catch(PDOException $error){
    echo $error->getMessage();
    die();
}

function filtrele($deger){
    $bir = trim($deger);
    $iki = strip_tags($bir);
    $uc = htmlspecialchars($iki, ENT_QUOTES);
    return $uc;
}

?>