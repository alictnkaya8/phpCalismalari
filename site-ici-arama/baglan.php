<?php 
    try{
        $db = new PDO("mysql:host=localhost;dbname=btkakademi", "root", "");
    } catch(PDOException $e){
        echo $e->getMessage();
        die();
    }

    function filtrele($deger){
        $bir = trim($deger);
        $iki = strip_tags($bir);
        $uc = htmlspecialchars($iki, ENT_QUOTES);
        return $uc;
    }
?>