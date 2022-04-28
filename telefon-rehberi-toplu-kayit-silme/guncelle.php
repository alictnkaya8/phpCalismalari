<?php

require 'connect-db.php';
if(isset($_POST['sumbit'])){

    $asagi = $_POST['siraAsagi'];
    $yukari = $_POST['siraYukari'];
    
    $query = $db->prepare("SELECT * FROM kisiler");
    $query->execute();
    $kisiler = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if(isset($asagi)){
        for($i = 0; $i < count($kisiler); $i++){
            $query = $db->prepare("UPDATE kisiler SET sira = ?+1 WHERE id = ?");
            $query->execute([
                $i,
                $kisiler['id']
            ]);
        }
        $kisiler = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    if(isset($yukari)){
        for($i = 0; $i < count($kisiler); $i++){
            $query = $db->prepare("UPDATE kisiler SET sira = ?-1 WHERE id = ?");
            $query->execute([
                $i,
                $kisiler['id']
            ]);
        }
        $kisiler = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    header('Location:index.php');
}



?>