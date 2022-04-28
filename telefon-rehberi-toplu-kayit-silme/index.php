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
        require 'connect-db.php';
        require 'sonuc.php';
        require 'guncelle.php';
    ?>

    <form action="sonuc.php" method="post">
        <table>
            <thead>
                <th>#</th>
                <th>Adı</th>
                <th>Soyadı</th>
                <th>Meslek</th>
                <th>Telefon</th>
                <th>Sıra</th>
                <th>Sil</th>
            </thead>
            <?php 
            $query = $db->prepare('SELECT * FROM kisiler ORDER BY sira ASC');
            $query->execute();
            $kisiler = $query->fetchAll(PDO::FETCH_ASSOC);
                
            foreach($kisiler as $kisi){
            ?>
            <tbody>
                <td>&nbsp;</td>
                <td><input type="text" name="ad" value="<?=$kisi['ad']?>"></td>
                <td><input type="text" name="soyad" value="<?=$kisi['soyad']?>"></td>
                <td><input type="text" name="meslek" value="<?=$kisi['meslek']?>"></td>
                <td><input type="text" name="telefon" value="<?=$kisi['telefon']?>"></td>
                <form action="guncelle.php" method="post">
                    <td align="center">
                        <input type="hidden" name="sira" value="<?=$kisi['sira']?>">
                        <input type="submit" name="siraAsagi" value="↓">
                        <input type="submit" name="siraYukari" value="↑">
                    </td>
                </form>
                <td align="center"><input type="checkbox" name="sil[]" value="<?=$kisi['id']?>"></td>
            </tbody>
            <?php
            } 
            ?>
            <tfoot>
                <td><b>Yeni:</b></td>
                <td><input type="text" name="ad"></td>
                <td><input type="text" name="soyad"></td>
                <td><input type="text" name="meslek"></td>
                <td><input type="text" name="telefon"></td>
                <td><input type="submit" name="submit" value="Kaydet"></td>
            </tfoot>            
        </table>        
    </form>
</body>
</html>