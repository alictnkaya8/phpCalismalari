<?php

    session_start();

    if(empty($_SESSION["siteDili"])){
        include "diltr.php";
    } else {
        if($_SESSION["siteDili"] == "Turkish"){
            include "diltr.php";
        } elseif($_SESSION["siteDili"] == "English"){
            include "dilen.php";
        }
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
    <table width="1000" align="center" height="50">
        <tr>
            <td><?= ANASAYFA ?></td>
            <td><?= HAKKIMIZDA ?></td>
            <td><?= ILETISIM ?></td>
            <td><?= URUNLER ?></td>
            <td><a href="secim.php?dilSecimi=Turkish" style="color: black; text-decoration: none;">TR</a>|
            <a href="secim.php?dilSecimi=English" style="color: black; text-decoration: none;">EN</a></td>
        </tr>
    </table>
</body>
</html>