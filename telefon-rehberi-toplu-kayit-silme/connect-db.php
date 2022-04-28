<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=btkakademi', 'root', '');
} catch (PDOException $e){
    $e->getMessage();
}


?>