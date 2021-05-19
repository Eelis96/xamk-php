<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Palautelomake</h2>
    <form action="nt2c.php" method="post">
        <label for="nimi">Nimi</label>
        <input type="text" name="nimi" id="nimi"><br>

        <label for="sahkoposti">Sähköposti</label>
        <input type="text" name="sahkoposti"><br>

        <label for="palaute">Palaute</label><br>
        <textarea name="palaute" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Lähetä">
    </form>

    <?php
    
        $nimi = htmlspecialchars($_POST['nimi']);
        $sahkoposti = htmlspecialchars($_POST['sahkoposti']);
        $palaute = htmlspecialchars($_POST['palaute']);


        if(empty($nimi)||empty($sahkoposti)||empty($palaute)){
            echo "Täytä kaikki kentät";
        }else{
            file_put_contents("palautteet.txt","$nimi ",FILE_APPEND);
            file_put_contents("palautteet.txt","$sahkoposti ",FILE_APPEND);
            file_put_contents("palautteet.txt","$palaute",FILE_APPEND);
            file_put_contents("palautteet.txt","\n",FILE_APPEND);


            //mail("joku.sahkoposti@gmail.com", "Palautetta", $palaute);
        }
    
    ?>
</body>
</html>