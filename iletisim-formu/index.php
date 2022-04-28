<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="tr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Formu</title>
    <style>
        .InputAlani{
            width: 100%;
            height: 15px;
            margin: 0;
            padding: 5px 10px 5px 10px;
        }
        .TextAlani{
            width: 100%;
            height: 150px;
            margin: 0;
            padding: 5px 10px 5px 10px;
        }
        .GonderBtn{
            height: 30px;
            margin: 0;
            padding: 5px 50px 5px 50px;
            border: 1px solid green;
            background: green;
            color: white;
        }
        .GonderBtn:hover{
            height: 30px;
            margin: 0;
            padding: 5px 50px 5px 50px;
            border: 1px solid green;
            background: greenyellow;
            color: black;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="sonuc.php" method="post">
        <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="150" height="30"> Ad - Soyad</td>
                <td width="20" height="30">:</td>
                <td width="330" height="30"><input type="text" class="InputAlani" name="adSoyad"></td>
            </tr>
            <tr>
                <td width="150" height="30">Telefon Numarası</td>
                <td width="20" height="30">:</td>
                <td width="330" height="30"><input type="text" class="InputAlani" name="telNo"></td>
            </tr>
            <tr>
                <td width="150" height="30">E-Mail Adresi</td>
                <td width="20" height="30">:</td>
                <td width="330" height="30"><input type="email" class="InputAlani" name="email"></td>
            </tr>
            <tr>
                <td width="150" height="30">Konu</td>
                <td width="20" height="30">:</td>
                <td width="330" height="30"><input type="text" class="InputAlani" name="konu"></td>
            </tr>
            <tr>
                <td width="150" height="30" valign="top"> Mesaj</td>
                <td width="20" height="30" valign="top">:</td>
                <td width="330" height="30"><textarea name="mesaj" class="TextAlani"></textarea></td>
            </tr>
            <tr>
                <td width="150" height="30">&nbsp;</td>
                <td width="20" height="30">&nbsp;</td>
                <td width="330" height="30" align="right"><input type="submit" class="GonderBtn" value="Gönder"></td>
            </tr>
        </table>
    </form>
</body>
</html>