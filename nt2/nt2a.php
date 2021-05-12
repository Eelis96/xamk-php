<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="nt2a.php" method="post">
        Puhelinnumero:<input type="text" name="puhnumero">
        <input type="submit" value="submit">
    </form>


    <?php
        $puhnumero = $_POST['puhnumero'];
        $lyhytpuhnumero = substr($puhnumero, 0, 3);
        echo $lyhytpuhnumero;
    ?>
</body>
</html>