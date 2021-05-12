<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ilmapallokauppa</h2>

    <form action="nt1c.php" method="post">
        Ilmapallojen määrä:<input type="number" min="0" name="ilmapallot">
        <input type="submit" value="Laske"><br><br>
    </form>

    <?php

        $ilmapallot = $_POST['ilmapallot'];        
        $kappalehinta = 1.50;

        if(empty($ilmapallot)){
            //jos ei ole syötetty mitään koodi ei tee mitään
            echo "Täytä kenttä!";
        }else{
            //jos ilmapalloja enemmän kuin 15 antaa alennuksen
            if($ilmapallot > 15){
                $loppusumma = $ilmapallot * $kappalehinta;
                $alennus = $loppusumma / 10;
                $maksettava = $loppusumma - $alennus;
                echo "Palloja: " .$ilmapallot. " kpl<br>";
                echo "Kappalehinta: " .$kappalehinta. "€<br>";
                echo "Loppusumma: " .$loppusumma. "€<br>";
                echo "alennus: " .$alennus. "€<br>";
                echo "<strong>Maksettava: " .$maksettava. "€<br>";
            }else{
                // jos vähemmän kuin 15 ei anna alennusta
                $loppusumma = $ilmapallot * $kappalehinta;
                echo "Palloja: " .$ilmapallot. " kpl<br>";
                echo "Kappalehinta: " .$kappalehinta. "€<br>";
                echo "<strong>Maksettava: " .$loppusumma. "€<br>";
            }
        }

    ?>
</body>
</html>