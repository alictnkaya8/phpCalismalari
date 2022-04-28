<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post" enctype="multipart/form-data">
        E-posta:
        <input name="email" type="text" placeholder="E-posta adresi"> <br><br>
        Konu:
        <input name="subject" type="text" placeholder="E-posta konusu"> <br><br>
        Mesaj:
        <textarea name="content" cols="30" rows="10"></textarea> <br><br>
        Dosya:
        <input type="file" name="attachment"> <br><br>
        <button type="submit">Gönder</button>
    </form>
</body>
</html>